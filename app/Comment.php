<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_id', 'name', 'email', 'body' , 'status'
    ];

    public function post() 
    {
        // model comment meruapakn child dari model post
        return $this->belongsTo(Post::class);
    }
}
