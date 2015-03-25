<?php namespace App\Waikoa\Model\MessageBoard;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Comment extends Model {

    use SoftDeletes;

    /**
     * Guarded fields
     *
     * @var array
     */
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}