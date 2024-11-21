<?php

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PackageFeatures>
 */
class PackageFeaturesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         // Pastikan Package ada terlebih dahulu
         $package = Package::inRandomOrder()->first();

         // Cek apakah Package ada, jika tidak buat baru
         if (!$package) {
             $package = Package::factory()->create();
         }
 
        return [
            'name' => $this->faker->words(2, true), // Nama fitur dengan 2 kata
            'description' => $this->faker->optional()->sentence(), // Deskripsi fitur (opsional)
            'packages_id' => $package->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
