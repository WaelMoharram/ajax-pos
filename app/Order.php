<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model 
{

    protected $table = 'orders';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('status');

    public function details()
    {
        return $this->hasMany('App\OrderDetails');
    }

    public function logs()
    {
        return $this->morphMany('App\Log');
    }

}