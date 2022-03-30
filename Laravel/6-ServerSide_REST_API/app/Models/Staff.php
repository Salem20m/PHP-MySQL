<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Staff extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'full_name',
        'photo',
        'code'
    ];

    protected function photo(): Attribute
    {

        //dd($this->photo);
        // https://laravel.com/docs/9.x/filesystem#file-urls
        return Attribute::make(
            get: fn($value) => url(Storage::url($value))
        );
    }

    public function groups() {
        return $this->belongsToMany(Group::class, 'group_staff', 'staff_id', 'group_id');

    }

    public function logs() {
        return $this->hasMany(Log::class);
    }
}
