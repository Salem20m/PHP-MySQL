<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'room_id',
        'title',
        'speaker',
        'type',
        'start',
        'end',
        'cost',
        'description'
    ];

    public function room() {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }

    public function getHours() {
        return Carbon::parse($this->start)->format('H:i') . ' - ' . Carbon::parse($this->end)->format('H:i');
    }

}
