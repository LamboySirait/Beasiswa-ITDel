<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostsBeasiswaInternal extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'start_date', // Add the 'start_date' column to the fillable array
        'end_date', // Add the 'end_date' column to the fillable array
    ];
    protected $table = 'postsbeasiswainternal';
}