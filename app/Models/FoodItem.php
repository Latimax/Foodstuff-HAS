<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'inventory'
    ];

    /**
     * Relationship to Voucher
     * Each food item may have multiple vouchers associated with it.
     */
    public function vouchers()
    {
        return $this->hasMany(Voucher::class);
    }
}
