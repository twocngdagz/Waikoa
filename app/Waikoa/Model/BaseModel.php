<?php namespace App\Waikoa\Model;

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
}