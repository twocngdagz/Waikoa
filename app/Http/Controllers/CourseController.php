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

//@TODO: validation, saving data(dropdowns), deletion, view model
class CourseController extends Controller 
{

	/**
     * Constructor Method.
     * @method void middleware('auth') instantiates role extension
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
		$classSize = $this->displayClassSize($course);
		
		$params = $this->labels($course);		
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
		$data = $this->classSize(Request::get('Course'));
		
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
		$classSize = $this->displayClassSize($course);
		
		$params = $this->labels($course);		
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
		$data = $this->classSize(Request::get('Course'));
		
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
	
	/**
	 * Set Column Labels.
	 *
	 * @param  obj  $course course model
	 * @return array $labels label values
	 */
	protected function labels($course)
	{
		$labels = [
			'course' => $course,
			'formName' => $course->exists ? 'Update Course' : 'Create Course',
			'information' => [
				'name', 'student_name','student_name_pl', 'instructor_name', 'materials_name', 
				'materials_name_pl', 'events_name', 'events_name_pl', 
				'webinars_name', 'webinars_name_pl', 'home_name', 'download_link'
			],	
			'radio' => ['class_size_a', 'class_size_b', 'class_size_c'],
			'dropDown' => ['comments_allowed', 'always_on_pre', 'always_on_post'],
			'schedule' => [
				'class_start', 'class_end', 'access_start', 'access_end', 'register_start', 
				'register_end'
			],
			'mailServer' => [ 'smtp_email', 'smtp_name', 'smtp_server', 'smtp_user']			
		];
		
		return $labels;
	}
	
	/**
	 * Set Class Size Values.
	 *
	 * @param  array  $data course model values
	 * @return array $data course model values
	 */
	protected function classSize($data) 
	{
		$className = ['class_size_a', 'class_size_b', 'class_size_c'];
		
		foreach($className as $value) {
			if ($data[$value] == 1) {
				$data[$value] = $data[$value . '_limit'];
			}
		}
		
		return $data;
	}
	
	/**
	 * Display Class Size Values.
	 *
	 * @param  obj  $model course model
	 * @return array $classSize html attribute values
	 */
	protected function displayClassSize($model) 
	{
		$classSize = [
			'class_size_a' => ['unlimited'=>'', 'limited'=>'', 'visibility'=>'hidden'],
			'class_size_b' => ['unlimited'=>'', 'limited'=>'', 'visibility'=>'hidden'],
			'class_size_c' => ['unlimited'=>'', 'limited'=>'', 'visibility'=>'hidden'],
		];
		
		foreach ($classSize as $key => $value) {
			if ($model->$key == 0) {
				$classSize[$key]['unlimited'] = 'checked';
				$classSize[$key]['visibility'] = 'hidden';
			} else {
				$classSize[$key]['limited'] = 'checked';
				$classSize[$key]['visibility'] = '';
			}
		}
		
		return $classSize;
	}

}
