<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'food_item_id',
        'beneficiary_id',
        'code',
        'is_redeemed',
        'expiry_date',
        'amount',
        'redeemed_at'
    ];

    /**
     * Relationship to FoodItem
     * A voucher is for a specific food item.
     */
    public function foodItem()
    {
        return $this->belongsTo(FoodItem::class);
    }

    /**
     * Relationship to User (Beneficiary)
     * A voucher is owned by a specific beneficiary.
     */
    public function beneficiary()
    {
        return $this->belongsTo(User::class, 'beneficiary_id');
    }
}
