<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'genre',
        'authorId',
        'isiBuku',
        'image',
    ];


    public function author()
    {
        return $this->belongsTo(User::class, 'authorId');
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
}
