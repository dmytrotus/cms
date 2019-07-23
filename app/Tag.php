<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name'
    ];

    public function posts()
    {
    	return $this->belongsToMany(Post::class); //звернути увагу на belongsToMany і belongsTo - є різниця
    }
}
