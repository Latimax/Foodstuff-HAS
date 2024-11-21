<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_number',
        'user_id',
        'amount',
        'order_date',
        'food_item_id',
        'voucher_id',
        'amount_paid',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function foodItem()
    {
        return $this->belongsTo(foodItem::class);
    }

    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }
}
