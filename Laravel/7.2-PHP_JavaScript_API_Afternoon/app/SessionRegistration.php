<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SessionRegistration extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'registration_id',
        'session_id',
    ];
}
