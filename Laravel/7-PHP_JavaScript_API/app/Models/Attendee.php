<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
      'firstname',
      'lastname',
      'username',
      'email',
      'registration_code',
      'login_token'
    ];

    protected $hidden = [
        'registration_code',
        'login_token',
    ];
}
