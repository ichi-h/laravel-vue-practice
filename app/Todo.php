<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['task', 'is_done'];

    public function order()
    {
        return $this->hasOne('App\Order');
    }
}
