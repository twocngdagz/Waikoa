<?php namespace App\Waikoa\Model;

use App\Waikoa\Model\BaseModel;

class Course extends BaseModel {

	/**
	 * States which field is NOT safe for mass assignment Input::all().
	 */
	//@TODO: adrian
	protected $guarded = ['id', 'account_id'];
	
	/**
	 * States which field is safe for mass assignment Input::all().
	 */
	//@TODO: adrian
	protected $fillable = ['id', 'account_id'];
}
?>
