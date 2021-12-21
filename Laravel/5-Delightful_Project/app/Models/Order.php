<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Order extends Model
{
    use HasFactory;

    //protected $table = 'orders';

    protected $primaryKey = 'order_id';

    public $timestamps = false;

    protected $casts = [
        'value' => 'decimal:2',
        'fee' => 'decimal:2'
    ];

    //Many to one
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
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

    /**
     * Set the date format.
     *
     * @param  string  $date
     * @return string
     */
    public function getDateAttribute($date): string
    {
        return $this->attributes['date'] = Carbon::parse($date)->format('d/m/Y');
    }

    public function getOrderIdAttribute($order_id) {
        return $this->attributes['order_id'] = str_pad($order_id,4,0,STR_PAD_LEFT);
    }

    //public function getValueAttribute($value) {
    //    return $this->attributes['order_id'] = number_format(2,2);
    //}
}
