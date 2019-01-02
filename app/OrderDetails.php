<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetails extends Model 
{

    protected $table = 'orders_details';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('order_id', 'item_id', 'price', 'amount');

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function item()
    {
        return $this->belongsTo('App\Item');
    }

    public function logs()
    {
        return $this->morphMany('App\Log');
    }

}