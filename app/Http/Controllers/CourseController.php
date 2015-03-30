<?php namespace App\Http\Controllers;

use App\Waikoa\Model\Course;
// use App\Schema;
// use App\Http\Requests;
use Request;
use Auth;
use Route;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Waikoa\Helpers\Helper;
use App\Http\Requests\CreateCourseRequest;


//@TODO: deleted_by and updated_by, summary, description
class CourseController extends Controller
{
    /**
     * Constructor Method.
     * @method void middleware auth instantiates role extension
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('allowedOnCourse');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$courses = Course::all();
        return view('course.show')->with('courses', $courses);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{		
		$course = new Course;		
		$selected = Helper::displayOptions($course);
		$classSize = $course->classSize();
		
		$params = $course->labels();
		$params['classSize'] = $classSize;
		$params['selected'] = $selected;		
		return view('course.form', $params); 
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateCourseRequest $request)	
	{
		$course = new Course;
		
		//set class size values
		$data = Helper::setClassSize(Request::All());
		
		// save model
		$data=Request::All();
		$data['user_id'] = Auth::user()->id;		
		
		$course = $course::create($data);		
		return redirect("course/page/{$course->id}")->with('success', 'You have successfully created a course.');		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function page($id)
	{	
		// redirect if model not found
		try {
			$course = Course::findOrFail($id);			
		
		} catch(ModelNotFoundException $e) {
			return redirect("courses")->withInput()->with('warning', 'Record not found.');
		}
		
		$params = $course->labels($course);
		$params['course'] = $course;
		return view('course.page',$params);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
    {
		// redirect if model not found
		try {
			$course = Course::findOrFail($id);		
		
		} catch(ModelNotFoundException $e) {
			return redirect("courses")->withInput()->with('warning', 'Record not found.');
		}
		
		$selected = Helper::displayOptions($course);        
		$classSize = $course->classSize();		
		$params = $course->labels();
		
		$format = [
			'class_start' => 'toDateString',
			'class_end' => 'toDateString',
			'access_start' => 'toDateString',
			'access_end' => 'toDateString',
			'register_start' => 'toDateString',
			'register_end' => 'toDateString',			
		];
		
		$course = Helper::formatDate($course, $format);
		
		$params['classSize'] = $classSize;
		$params['selected'] = $selected;
		
        return view('course.form', $params);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(CreateCourseRequest $request) 
	{
        $data = Request::All();				
        $course = Course::findOrFail($data['course_id']);
		
		//set class size values
		$data = Helper::setClassSize(Request::All());
		
		// save model		
		$course->fill($data);
		$course->save($data);
		
		return redirect("course/edit/{$course->id}")->with('success', 'successfully updated!');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// redirect if model not found
		try {
			$course = Course::findOrFail($id);		
		
		} catch(ModelNotFoundException $e) {
			return redirect("courses")->withInput()->with('warning', 'Record not found.');
		}
		
		$course->delete();
		return redirect("courses")->withInput()->with('success', 'Course record deleted.');
	}
}
