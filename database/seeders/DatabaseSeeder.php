<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Package;
use App\Models\PackageFeatures;
use App\Models\Payment;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Package::factory()->count(5)->create(); 
        User::factory()->count(10)->create(); 
        PackageFeatures::factory()->count(rand(2, 5))->create();
        Booking::factory()->count(rand(10, 50))->create();
        Payment::factory()->count(rand(5, 20))->create();
    }
}
