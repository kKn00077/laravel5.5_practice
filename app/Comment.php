<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $guarded = []; 

    public function blog()
    {
        return $this->belongsTo('App\Blog');
    }
}
