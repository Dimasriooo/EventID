<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable =[
        'id',
        'event_date',
        'status',
        'total_price',
        'additional_notes',
        'user_id',
        'packages_id',
    ];

    public function user() {
        return $this->belongsTo(user:: class, 'user_id');
    }

    public function package() {
        return $this->belongsTo(Package::class, 'package_id');
    }

    public function payment() {
        return $this->hasOne(Payment::class, 'booking_id');
    }
}

