<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin(){
        return $this->type === 'admin';
    }

    public function isUser(){
        return $this->type === 'user';
    }

    public function isAuthor(){
        return $this->type === 'author';
    }

    protected function getTypeAttribute($value){
        switch ($value){
            case 0:
                return 'user';
            case 1:
                return 'admin';
            case 2:
                return 'author';
            default:
                return 'undefined';
        }
    }

    public function books()
    {
        return $this->hasMany(Book::class, 'authorId');
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
}
