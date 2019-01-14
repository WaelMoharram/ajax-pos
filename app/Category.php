<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{

    protected $table = 'categories';
    public $timestamps = true;

    use SoftDeletes;
    use LogsActivity;

    protected static $logAttributes = ['*'];
    protected $dates = ['deleted_at'];
    protected $fillable = array('name', 'image', 'note');

    public function items()
    {
        return $this->hasMany('App\Item');
    }

}
