<?php namespace App\Http\Controllers;

use App\Waikoa\Model\Lesson;
// use App\Schema;
use App\Http\Requests;
use Request;
use Auth;
use Route;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Waikoa\Helpers\Helper;
use App\Http\Requests\CreateLessonRequest;

class LessonController extends Controller 
{
    /**
     * Constructor Method.
     * @method void middleware auth instantiates role extension
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('allowedOnCourse');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$lessons = Lesson::all();
        return view('lesson.show')->with('lessons', $lessons);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{		
		$lesson = new Lesson;
		$params = $lesson->labels();
		$selected = Helper::LessonDisplayOptions($lesson);
		$params['selected'] = $selected;
		
		return view('lesson.form', $params); 
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateLessonRequest $request)	
	{
		$lesson = new Lesson;
		
		//set class size values
		$data = Helper::setClassSize(Request::All());
		
		// save model
		$data=Request::All();
		$data['course_id'] = Request::get('id');		
		
		$lesson = $lesson::create($data);		
		return redirect("lesson/page/{$lesson->id}")->with('success', 'You have successfully created a lesson.');		
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
			$lesson = Lesson::findOrFail($id);			
		
		} catch(ModelNotFoundException $e) {
			return redirect("lessons")->withInput()->with('warning', 'Record not found.');
		}
		
		$params = $lesson->labels($lesson);
		$params['lesson'] = $lesson;
		return view('lesson.page',$params);
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
			$lesson = Lesson::findOrFail($id);		
		
		} catch(ModelNotFoundException $e) {
			return redirect("lessons")->withInput()->with('warning', 'Record not found.');
		}
		
		$selected = Helper::LessonDisplayOptions($lesson);
		$params['selected'] = $selected;      
		$params = $lesson->labels();
		
        return view('lesson.form', $params);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(CreateLessonRequest $request) 
	{
        $data = Request::All();				
        $lesson = Lesson::findOrFail($data['lesson_id']);
		
		//set class size values
		$data = Helper::setClassSize(Request::All());
		
		// save model		
		$lesson->fill($data);
		$lesson->save($data);
		
		return redirect("lesson/edit/{$lesson->id}")->with('success', 'successfully updated!');
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
			$lesson = Lesson::findOrFail($id);		
		
		} catch(ModelNotFoundException $e) {
			return redirect("lessons")->withInput()->with('warning', 'Record not found.');
		}
		
		$lesson->delete();
		return redirect("lessons")->withInput()->with('success', 'lesson record deleted.');
	}
}
