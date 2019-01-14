<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Order extends Model 
{

    protected $table = 'orders';
    public $timestamps = true;

    use SoftDeletes;
    use LogsActivity;
    protected static $logAttributes = ['*'];
    protected $dates = ['deleted_at'];
    protected $fillable = array('status');
    protected $with = ['details'];

    public function details()
    {
        return $this->hasMany('App\OrderDetail');
    }

}
