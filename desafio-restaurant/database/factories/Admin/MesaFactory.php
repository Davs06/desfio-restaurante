<?php

namespace Database\Factories;

use App\Models\Admin\Mesa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Mesa>
 */
class MesaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Mesa::class;


    public function definition(): array
    {
        return [
            'quantidade_de_lugares' => $this->faker->numberBetween(2, 6), // Mesas com 2 a 6 lugares
        ];
    }
}
