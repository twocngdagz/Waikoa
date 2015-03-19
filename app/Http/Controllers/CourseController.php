<?php namespace App\Http\Controllers;

// Debugging
use App\Debug;

use App\Waikoa\Model\Course;
use App\Schema;
use App\Http\Requests;
use Request;
use Auth;
use Route;
use App\Http\Controllers\Controller;
use App\Waikoa\Helpers\Helper;

//@TODO: validation, saving data(dropdowns), deletion, view model
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
		$classSize = $course->classSize();
		
		$params = $course->labels();
		$params['classSize'] = $classSize;
		return view('course.form', $params); 
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$course = new Course;
		$course->user_id = Auth::user()->id;

		//set class size values
		$data = Helper::setClassSize(Request::get('Course'));
		
		// save model
		$course->saveFillable($course, $data);		
		return redirect("course/edit/{$course->id}")->withInput()->with('success', 'You have successfully created a course.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
    {		
        $course = Course::findOrFail($id);
		$classSize = $course->classSize();
		
		$params = $course->labels();
		$params['classSize'] = $classSize;
		
        return view('course.form', $params);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update() 
	{
	
        $data = Request::get('Course');
        $course = Course::findOrFail($data['course_id']);
		
		//set class size values
		$data = Helper::setClassSize(Request::get('Course'));
		
		// save model
		$course->saveFillable($course, $data);		
		
		return redirect("course/edit/{$course->id}")->withInput()->with('success', 'successfully updated!');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}




}
