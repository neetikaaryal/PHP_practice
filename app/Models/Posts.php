<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = [
        'title',
        'body',
        'email'
      ];
    // use HasFactory;
    // private $table = 'posts';
    // private $primarykey = "id";
}
