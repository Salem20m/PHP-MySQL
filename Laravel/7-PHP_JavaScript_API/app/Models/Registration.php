<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'attendee_id',
        'ticket_id',
        'registration_time'
    ];

    public function attendee() {
        return $this->belongsTo(Attendee::class, 'attendee_id', 'id');
    }

    public function ticket() {
        return $this->belongsTo(Ticket::class, 'ticket_id', 'id');
    }
}
