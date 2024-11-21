<?php

namespace Database\Factories;

use App\Models\Package;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $package = Package::inRandomOrder()->first();
        $user = User::inRandomOrder()->first();

        // Cek apakah Package dan User ada, jika tidak buat baru
        if (!$package) {
            $package = Package::factory()->create();
        }
        if (!$user) {
            $user = User::factory()->create();
        }

        return [
            'event_date' => fake()->date(),
            'status' => fake()->randomElement(['confirmed', 'pending', 'completed']),
            'total_price' => fake()->randomFloat(2, 1, 1000),
            'additional_notes' => $this->faker->optional()->sentence(),
            'packages_id' => $package->id,
            'user_id' => $user->id,
        ];
    }
}
