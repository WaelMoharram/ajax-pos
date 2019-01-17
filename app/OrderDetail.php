<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class OrderDetail extends Model
{

    protected $table = 'orders_details';
    public $timestamps = true;

    use SoftDeletes;
    use LogsActivity;
    protected static $logAttributes = ['*'];
    protected $dates = ['deleted_at'];
    protected $fillable = array('order_id', 'price', 'amount', 'size_id');

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function item()
    {
        return $this->belongsTo('App\Item')->withTrashed();
    }

    public function size()
    {
        return $this->belongsTo('App\Size')->withTrashed();
    }

}
