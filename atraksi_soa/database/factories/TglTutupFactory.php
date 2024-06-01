<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\tgl_tutup>
 */
class TglTutupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'atraksi_id' => mt_rand(4,5),
            'tgl' => fake()->dateTimeThisYear(),
        ];
    }
}
