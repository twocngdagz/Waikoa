<?php namespace App\Waikoa\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Waikoa\Model\BaseModel;

class Course extends BaseModel {

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
	protected $fillable = ['name', 'student_name','student_name_pl', 'instructor_name', 'materials_name', 'materials_name_pl',
		'events_name', 'events_name_pl', 'webinars_name', 'webinars_name_pl', 'home_name', 'comments_allowed', 'download_link', 
		'class_start', 'class_end', 'access_start', 'access_end', 'register_start', 'register_end', 'class_size_a', 'class_size_b',
		'class_size_c', 'course_material_schedule', 'always_on_pre', 'always_on_post', 'date_visible_offset', 'email_notif_offset',
		'smtp_email', 'smtp_name', 'smtp_server', 'smtp_user', 'smtp_password', 'user_id'
	];


    /**
     * Display Class Size Values.
     *
     * @return array $classSize html attribute values
     */

    public function classSize()
    {
        $classSize = [
            'class_size_a' => ['unlimited'=>'', 'limited'=>'', 'visibility'=>'hidden'],
            'class_size_b' => ['unlimited'=>'', 'limited'=>'', 'visibility'=>'hidden'],
            'class_size_c' => ['unlimited'=>'', 'limited'=>'', 'visibility'=>'hidden'],
        ];

        foreach ($classSize as $key => $value) {
            if ($this->$key == 0) {
                $classSize[$key]['unlimited'] = 'checked';
                $classSize[$key]['visibility'] = 'hidden';
            } else {
                $classSize[$key]['limited'] = 'checked';
                $classSize[$key]['visibility'] = '';
            }
        }

        return $classSize;
    }


    /**
     * Set Column Labels.
     *
     * @param  obj  $course course model
     * @return array $labels label values
     */

    public function labels()
    {
        $labels = [
            'course' => $this,
            'formName' => $this->exists ? 'Update Course' : 'Create Course',
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
}
?>
