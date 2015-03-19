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
}
