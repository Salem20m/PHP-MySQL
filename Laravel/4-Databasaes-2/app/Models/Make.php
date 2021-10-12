<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    use HasFactory;

    protected $table = 'makes';

    protected $primaryKey = 'id';

    public $timestamps = false;

    //One to Many
    public function cars() {
        return $this->hasMany(Car::class);
    }
}
