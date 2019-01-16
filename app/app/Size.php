<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model 
{

    protected $table = 'sizes';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name', 'price', 'item_id');
    protected $with = ['item'];

    public function item()
    {
        return $this->belongsTo('App\Item');
    }

    public function orders_details()
    {
        return $this->hasMany('App\OrderDetails');
    }

}
