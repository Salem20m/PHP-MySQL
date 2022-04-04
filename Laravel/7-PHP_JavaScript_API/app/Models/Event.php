<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'organizer_id',
        'name',
        'slug',
        'date'
    ];

    protected $casts = [
      'date' => 'datetime:y-m-d'
    ];

    public function organizer() {
        return $this->belongsTo(Organizer::class, 'organizer_id', 'id');
    }
}
