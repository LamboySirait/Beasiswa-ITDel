<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Testimoni extends Model{
   use Sortable;

    protected $table = 'testimoni';
    protected $primarykey = 'id';
    protected $fillable = [
      'nama', 'isi', 'author',
    ];
    public $sortable = [
        'nama', 'isi', 'author',
    ];
}

