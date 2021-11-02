<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    //protected $table = 'orders';

    protected $primaryKey = 'order_id';

    public $timestamps = false;

    //Many to one
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Many to many
    public function items() {
        return $this->belongsToMany(Item::class, 'order_details', 'order_id', 'item_id')
            ->withPivot('address', 'quantity');
    }

    //Many to one
    public function fee() {
        return $this->hasOne(Fee::class);
    }
}
