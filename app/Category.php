<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model 
{

    protected $table = 'categories';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name', 'image', 'note');

    public function items()
    {
        return $this->hasMany('App\Item');
    }

    public function logs()
    {
        return $this->morphMany('App\Log');
    }

}