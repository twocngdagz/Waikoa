<?php namespace App\Waikoa\Observers;

use Carbon\Carbon;

class LessonObserver 
{
    public function saving($model)
    {
		$dt = Carbon::parse($model->date);		
        $model->start_time = $dt->toDateString() . ' ' . $model->start_time;		
        $model->end_time = $dt->toDateString() . ' ' . $model->end_time;		
    }

    public function saved($model)
    {
		// 
    }	
}