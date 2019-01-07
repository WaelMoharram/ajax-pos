<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model 
{

    protected $table = 'pos_log';
    public $timestamps = true;
    protected $fillable = array('user_id', 'model_id', 'model_type', 'operation','status' ,'note');

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function model()
    {
        return $this->morphTo();
    }

}
