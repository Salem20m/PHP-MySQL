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
}
