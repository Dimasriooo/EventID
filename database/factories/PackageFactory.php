<?php

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true), // Nama paket dengan 3 kata
            'description' => $this->faker->sentence(), // Deskripsi random
            'base_price' => $this->faker->randomFloat(2, 100, 10000), // Harga antara 100 dan 10,000
            'max_guest' => $this->faker->optional()->numberBetween(10, 500), // Maksimal tamu (opsional)
            'category' => $this->faker->randomElement(['wedding', 'birthday', 'gathering']), // Kategori acak
            'duration_hours' => $this->faker->optional()->numberBetween(1, 12), // Durasi acara dalam jam (opsional)
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
