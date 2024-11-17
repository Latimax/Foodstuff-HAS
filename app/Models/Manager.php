<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $table = 'users';
    
    protected $guarded = []; // Allows all attributes to be mass assignable
}
