<?php

namespace App\Models;

use Carbon\Carbon;
use Cassandra\Table;
use Illuminate\Database\Eloquent\Casts\Attribute;
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

    public function registration() {
        return $this->hasMany(Registration::class, 'ticket_id', 'id');
    }



    public function aaaa(){

        if(!$this->special_validity) {
            return null;
        }

        $svArray = json_decode($this->special_validity);

        return match ($svArray->type) {
            "date" => "Available until " . Carbon::parse($svArray->date)->format("F d, Y"),
            "amount" => $svArray->amount . " tickets available"
        };
    }

}
