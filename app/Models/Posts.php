<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id'; // Updated property name
    protected $fillable = [
        'id_article', 'title', 'tags', 'caption', 'thumbnail', 'description', 'created_at', 'updated_at'
    ];

    // use HasFactory;
}