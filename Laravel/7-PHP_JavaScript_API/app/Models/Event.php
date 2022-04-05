<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
      'date' => 'datetime:Y-m-d'
    ];

    protected function date(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format("F d, Y")
        );
    }

    public function organizer() {
        return $this->belongsTo(Organizer::class, 'organizer_id', 'id');
    }
}
