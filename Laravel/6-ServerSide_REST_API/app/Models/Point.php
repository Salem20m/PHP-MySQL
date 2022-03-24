<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Point extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'parent',
        'name',
    ];

    public function parent() {
        return $this->belongsTo(Point::class, 'parent');
    }

    public function children() {
        return $this->hasMany(Point::class, 'parent');
    }


}
