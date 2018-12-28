<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'slug', 'title', 'body', 'featured', 'status', 'published_at'
    ];

    public function user()
    {
        // one to many = 1 user dapat mempunyai banyak posts
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
