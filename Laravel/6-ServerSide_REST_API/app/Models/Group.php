<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class    Group extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    public function staff() {
        return $this->belongsToMany(Staff::class, 'group_staff', 'group_id', 'staff_id');

    }

    public function points() {
        return $this->belongsToMany(Point::class, 'group_points', 'group_id', 'point_id');
    }
}
