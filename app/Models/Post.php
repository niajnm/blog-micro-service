<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Specify the table if it's not the plural of the model name
    protected $table = 'posts';

    // Allow mass assignment for these attributes
    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

    // Define relationships, if any (e.g., if a Post belongs to a User)
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
