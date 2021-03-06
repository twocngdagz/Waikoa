<?php namespace App\Waikoa\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Waikoa\Model\BaseModel;

class Lesson extends BaseModel {

	use SoftDeletes;
	
	/**
	 * Used for soft/pseudo Deleting a user model.
	 *
	 * @var string/timestamp
	 */
	protected $dates = ['deleted_at'];

	/**
	 * States which field is NOT safe for mass assignment Input::all().
	 */	
	protected $guarded = ['id', 'updated_by', 'deleted_by', 'updated_at', 'deleted_at'];
	
	/**
	 * States which field is safe for mass assignment Input::all().
	 */	
	protected $fillable = ['title', 'description', 'content', 'type', 'date', 'url', 'download_url', 'start_time',
		'end_time', 'date_visible', 'email_on', 'comments_allowed', 'before_message', 'during_message', 
		'after_message', 'course_id', 'file_name', 'mp3_name'
	];
	
	/**
	 * Defines Relationship: Lesson Belongs to Course
	 * uses foreign key course_id
	 */	
	public function course()
    {
        return $this->belongsTo('App\Waikoa\Model\Course');
    }

    /**
     * Set Column Labels.
     *
     * @param  obj  $course course model
     * @return array $labels label values
     */
    public function labels()
    {
        $params = [
            'lesson' => $this,
            'formName' => $this->exists ? 'Update Lesson' : 'Create Lesson',            
            'information' => ['title', 'url', 'download_url', 'mp3_name', 'file_name'],
			'content' => ['description', 'content'],
			'textArea' => ['before_message', 'during_message', 'after_message'],
            'dropDown' => ['type', 'comments_allowed'],
            'schedule' => ['date', 'start_time', 'end_time', 'date_visible', 'email_on']         
        ];

        return $params;
    }	
}
