<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $table = 'packages';
    protected $primaryKey = 'Packages_id';

    protected $fillable = [
        'name', 
        'description', 
        'base_price', 
        'max_guest', 
        'category', 
        'duration_hours'
    ];

    public function features()
    {
        return $this->hasMany(PackageFeatures::class, 'packages_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'packages_id');
    }
}
