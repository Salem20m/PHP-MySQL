<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'channel_id',
        'name',
        'capacity'
    ];

    public function channel() {
        return $this->belongsTo(Channel::class, 'channel_id', 'id');
    }

    public function sessions() {
        return $this->hasMany(Session::class, 'room_id', 'id');
    }

    //public function event() {
    //    return $this->belong
    //}

    public function isFull() {
        $eventRegestrations = $this->channel->event->registrations->count();

        if ($this->capacity <= $eventRegestrations)
            return true;

        return false;
    }
}
