<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dept extends Model
{
    protected $fillable = [
        'dept_id',
        'dept_name',
    ];

    //hasMany設定
    public function employees()
    {
        return $this->hasMany('App\Employee','dept_id','dept_id');
    }
}
