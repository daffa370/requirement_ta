<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nis' => $this->faker->unique()->numberBetween(1, 10000),
            'nama' => $this->faker->name(),
            'tanggal_lahir' => now(),
            'alamat' => $this->faker->address(),
            'kelas_id' => $this->faker->numberBetween(1, 1),
            'user_id' => $this->faker->numberBetween(2, 2),
        ];
    }
}
