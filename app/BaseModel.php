<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Base Class for Models
 * Contains methods shared accross models
 * @author Adrian Adriano storemalt@gmail.com
 */
class BaseModel extends Model {

	/**
	 * Get Column/Field names of a given model object
	 */
	public function columns()
	{			
		$fields = array();
		$table = $this->getTable();		
		$data = DB::select(" SHOW COLUMNS FROM " . $table);
		foreach ($data as $key => $value) {
			$fields[] = $value->Field;
		}
		return $fields;
    }
	
	/**
	 * Saves massed assigned fillable columns
	 * @var obj $model model class instance
	 * @var array $attributes table column attributes with values
	 * @return boolean if successfull
	 */
	public function saveFillable($model, $attributes)
	{
		$fillable = $model->getFillable();
		foreach ($attributes as $key => $value) {
			if (in_array($key, $fillable)) {
				$model->$key = $value;
			}
		}
		$success = $model->save();		
		return $success;
    }

}