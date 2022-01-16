<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['task', 'isDone'];

    public function order()
    {
        return $this->hasOne('App\Order');
    }
}
