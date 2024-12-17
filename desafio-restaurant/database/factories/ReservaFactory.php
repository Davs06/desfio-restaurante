<?php

namespace Database\Factories;

use App\Models\Mesa;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reserva>
 */
class ReservaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    protected $model = Reserva::class;

    public function definition(): array
    {

        $inicio = $this->faker->dateTimeBetween('18:00:00', '23:00:00');
        $fim = (clone $inicio)->modify('+1 hours');

        return [
            'mesa_id' => Mesa::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'inicio_reserva' => $inicio,
            'fim_reserva' => $fim,
        ];
    }
}
