<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'subject',
        'message',
        'status',
        'is_reply',
    ];

    // Relationship with User (sender)
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    // Relationship with Admin (receiver)
    public function receiver()
    {
        return $this->belongsTo(Admin::class, 'receiver_id');
    }
}
