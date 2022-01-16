<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['todo_order'];

    public function todo()
    {
        return $this->belongTo('App\Todo');
    }
}
