<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageFeatures extends Model
{
    use HasFactory;

    protected $table = "package_features";

    protected $fillable = [
        'name', 
        'description',
        'packages_id',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class, 'packages_id');
    }
    
}
