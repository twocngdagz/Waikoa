<?php namespace App\Http\Controllers;

// Debugging
use App\Debug;

use App\Course;
use App\Schema;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller {

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
		$attributes = $course->columns();		
        return view('course.form', [
			'course' => $course,
			'formName' => 'Create',
			'attributes' => $attributes
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
        return view('course.form', [
			'course' => $course,
			'formName' => 'Update'
		]);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update() 
	{
        $data = Request::all();
        $course = Course::findOrFail($data['course_id']);
        $course->name = $data['name'];
        $course->email = $data['email'];
        $course->save();
		
        return redirect('courses');
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
