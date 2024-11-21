<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $booking = Booking::inRandomOrder()->first();

        if(!$booking){
            $booking = Booking::factory()->create();
        }

        return [
            'amount' => $this->faker->randomFloat(2, 50, 5000), // Jumlah antara 50 dan 5000 dengan 2 desimal
            'payment_method' => $this->faker->optional()->randomElement(['credit_card', 'paypal', 'bank_transfer']), // Metode pembayaran (opsional)
            'status' => $this->faker->randomElement(['confirmed', 'pending', 'completed']), // Status pembayaran
            'booking_id' => Booking::inRandomOrder()->first()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
