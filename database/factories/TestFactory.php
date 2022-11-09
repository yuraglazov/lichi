<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Test>
 */
class TestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $types = ['success', 'normal', 'illegal', 'failed'];

        return [
            'script_name' => $this->faker->name(20),
            'start_time' => time(),
            'end_time' => time(),
            'result' => $types[array_rand($types, 1)]
        ];
    }
}
