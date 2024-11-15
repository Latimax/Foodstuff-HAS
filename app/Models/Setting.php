<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    
    protected $table = 'settings';
    
    protected $guarded = []; // Allows all attributes to be mass assignable

}
