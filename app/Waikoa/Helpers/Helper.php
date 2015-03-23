<?php namespace App\Waikoa\Helpers;

use App\Waikoa\Model\Course;

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
		];
		
		foreach ($selected as $key => $value) {
			if ($model->$key == 0) {
				$selected[$key]['no'] = 'selected';				
			} else {
				$classSize[$key]['yes'] = 'selected';				
			}
		}
		
		return $selected;
	}
}
