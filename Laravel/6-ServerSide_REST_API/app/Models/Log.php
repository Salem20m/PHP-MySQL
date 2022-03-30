<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'staff_id',
        'point_id',
        'camera',
        'access'
    ];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    public function staff() {
        return $this->hasMany(Staff::class, 'staff_id', 'id');
    }

    public function point() {
        return $this->hasMany(Point::class, 'point_id', 'id');
    }
}
