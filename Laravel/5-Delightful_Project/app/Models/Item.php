<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $primaryKey = 'item_id';

    public $timestamps = false;

    //Many to many
    public function orders() {
        return $this->belongsToMany(Order::class);
    }

    public function getPriceAttribute($value) {
        return number_format($value, 2);
    }
}
