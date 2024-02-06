<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Posts extends Model
{
    protected $fillable = [
        'title',
        'description',
        'author',
        'image',
        'tag',
        'type',
        'status',
      ];
    // use HasFactory;
    // private $table = 'posts';
    // private $primarykey = "id";
    public function types(): HasOne
    {
        return $this->hasOne(Type::class, 'id', 'type');       
    }
    public function tags(): HasMany
    {
        return $this->hasMany(Tag::class, 'id', 'tag');
    }
  }
  
  