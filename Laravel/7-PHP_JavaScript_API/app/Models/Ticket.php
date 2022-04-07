<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class Ticket extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'event_tickets';

    protected $fillable = [
        'event_id',
        'name',
        'cost',
        'special_validity'
    ];

    public function event() {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }
}
