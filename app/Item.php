<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Item extends Model 
{

    protected $table = 'items';
    public $timestamps = true;

    use SoftDeletes;
    use LogsActivity;
    protected static $logAttributes = ['*'];
    protected $dates = ['deleted_at'];
    protected $fillable = array('name', 'image', 'price', 'note', 'category_id');

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function orders_details()
    {
        return $this->hasMany('App\OrderDetails');
    }

    public function sizes()
    {
        return $this->hasMany('App\Size');
    }

}
