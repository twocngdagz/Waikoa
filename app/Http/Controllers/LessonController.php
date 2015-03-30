<?php namespace App\Http\Controllers;

use App\Waikoa\Model\Lesson;
use App\Waikoa\Model\Course;
// use App\Schema;
use DB;
use App\Http\Requests;
use Request;
use Auth;
use Route;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Waikoa\Helpers\Helper;
use App\Waikoa\Observers\LessonObserver;
use App\Http\Requests\CreateLessonRequest;

Lesson::observe(new LessonObserver);

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
	public function index($id)
	{
		// redirect if model not found
		try {
			$course = Course::findOrFail($id);			
			
		} catch(ModelNotFoundException $e) {
			return redirect("lessons")->with('warning', 'Record not found.');
		}
		
		$lessons = $course->lessons;
		
        return view('lesson.show')->with('lessons', $lessons);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		// redirect if model not found
		try {
			$course = Course::findOrFail($id);			
		
		} catch(ModelNotFoundException $e) {
			return redirect("lessons")->with('warning', 'Record not found.');
		}
		
		$lesson = new Lesson;
		$params = $lesson->labels();
		$selected = Helper::LessonDisplayOptions($lesson);
		$params['selected'] = $selected;		
		$params['course'] = $course;
		
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
		
		// save model
		$data=Request::All();
		$data['course_id'] = Request::get('course_id');		
		
		$lesson = $lesson::create($data);		
		return redirect()->route('lessonPage', ['id' => $data['course_id'], 'les' => $lesson->id])->with('success', 'You have successfully created a lesson.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function page()
	{	
		// redirect if model not found
		try {
			$lesson = Lesson::findOrFail(Request::get('les'));
		
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
			$lesson = Lesson::findOrFail(Request::get('les'));		
			$course = Course::findOrFail($id);		
		
		} catch(ModelNotFoundException $e) {
			return redirect("lessons")->withInput()->with('warning', 'Record not found.');
		}
		
		$params = $lesson->labels();		
		$format = [
			'date' => 'toDateString',
			'start_time' => 'format',
			'end_time' => 'format',
			'date_visible' => 'toDateString',
			'email_on' => 'toDateString',
		];
		
		$lesson = Helper::formatDate($lesson, $format);
		$selected = Helper::LessonDisplayOptions($lesson);		
		$params['selected'] = $selected;	
		$params['course'] = $course;
		
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
		
		// save model		
		$lesson->fill($data);
		$lesson->save($data);
		
		return redirect()->route('lessonEdit', ['id' => $data['course_id'], 'les' => $lesson->id])->with('success', 'successfully updated!');		
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		// redirect if model not found
		try {
			$lesson = Lesson::findOrFail(Request::get('les'));	
		
		} catch(ModelNotFoundException $e) {
			return redirect("lessons")->with('warning', 'Record not found.');
		}
		
		$lesson->delete();
		return redirect("lessons")->with('success', 'lesson record deleted.');
	}
}
