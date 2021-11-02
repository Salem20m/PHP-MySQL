<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    protected $primaryKey = null; //////////////////////////////
    protected $table = 'order_fee';
    public $timestamps = false;

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function getFeeAttribute($value) {
        return number_format($value, 2);
    }

    public static function getCurrentFee() {
        return Fee::first()->fee;
    }
}
