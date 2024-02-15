<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ExtraCuricularFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->username(),
            'nama_pembina' => $this->faker->name(),
            'deskripsi' => $this->faker->sentence(),
        ];
    }
}
