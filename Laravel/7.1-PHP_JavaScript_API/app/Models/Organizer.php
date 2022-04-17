<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

//              Extends User, not Model, Because we are using this Model to authenticate
class Organizer extends User
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
        'email',
        'password_hash'
    ];

    protected $hidden = [
        'password_hash'
    ];

    // Override the original method because the column name is 'password_hash' instead of 'password'
    public function getAuthPassword()
    {
        return $this->password_hash;
    }

    public function events() {
        return $this->hasMany(Event::class, 'organizer_id', 'id')->orderBy('date');
    }
}
