<?php namespace App\Waikoa\Helpers;

use App\Waikoa\Model\Course;
use Carbon\Carbon;

class Helper {

    /**
     * Set Class Size Values.
     *
     * @param  array  $data course model values
     * @return array $data course model values
     */

    public static function setClassSize($data)
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
	 * Display Option Values.
	 *
	 * @param  obj  $model course model
	 * @return array $selected html attribute values
	 */
	public static function displayOptions($model) 
	{		
		$selected = [
			'comments_allowed' => ['yes'=>'', 'no'=>''], 
			'always_on_pre' => ['yes'=>'', 'no'=>''], 
			'always_on_post' => ['yes'=>'', 'no'=>''], 
			'date_visible_offset' => [-5=>'', -4=>'', -3=>'', -2=>'', -1=>'', 0=>''], 
			'email_notif_offset' => [-5=>'', -4=>'', -3=>'', -2=>'', -1=>'', 0=>'', 1=>'', 2=>'', 3=>''], 
			'course_material_schedule' => [0=>'', 1=>'', 2=>'', 3=>'', 4=>''], 
		];
		
		foreach ($selected as $key => $value) {
			if (!in_array($key, array('date_visible_offset', 'email_notif_offset', 'course_material_schedule'))) {
				if ($model->$key == 0) {
					$selected[$key]['no'] = 'selected';				
				} else {
					$selected[$key]['yes'] = 'selected';				
				}
			}
		}
		
		$selected = Self::selected($model, $selected, 'date_visible_offset');		
		$selected = Self::selected($model, $selected, 'email_notif_offset');
		$selected = Self::selected($model, $selected, 'course_material_schedule');
		
		return $selected;
	}
	
	/**
	 * Display Option Values.
	 *
	 * @param  obj  $model course model
	 * @return array $selected html attribute values
	 */
	public static function lessonDisplayOptions($model) 
	{		
		$selected = [
			'type' => [1=>'', 2=>'', 3=>''], 
			'comments_allowed' => [0=>'', 1=>'']	
		];
		
		$selected = Self::selected($model, $selected, 'type');
		$selected = Self::selected($model, $selected, 'comments_allowed');
		
		return $selected;
	}
	
	/**
	 * Display Formats for Lesson date and time
	 *
	 * @param  obj  $model lesson model	 
	 * @return obj $model lesson model with formatted date and time
	 */
	public static function formatLessonDate($model) 
	{
		$date = Carbon::parse($model->date);
		$model->date = $date->toDateString();
		
		$startTime = Carbon::parse($model->start_time);
		$model->start_time = $startTime->format('g:i:s A');
		
		$endTime = Carbon::parse($model->end_time);
		$model->end_time = $endTime->format('g:i:s A');
		
		$dateVisible = Carbon::parse($model->date_visible);
		$model->date_visible = $dateVisible->toDateString();
		
		$emailOn = Carbon::parse($model->email_on);
		$model->email_on = $emailOn->toDateString();
		
		return $model;
	}
	
	/**
	 * Sets selected values for Course Model Dropdown options
	 *
	 * @param  obj  $model course model
	 * @param  array $selected course model attributes
	 * @param  array $attribute target course model field dropdown
	 * @return array $selected html selected option values
	 */
	protected static function selected($model, $selected, $attribute)
	{		
		foreach ($selected[$attribute] as $key => $value) {		
			if ($model->$attribute == $key) {
				$selected[$attribute][$key] = 'selected';
			}
		}		
		return $selected;
		
	}	
}
