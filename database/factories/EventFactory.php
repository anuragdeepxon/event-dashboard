<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;
use Illuminate\Encryption\Encrypter;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    protected $model = Event::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->paragraph,
            'start_date' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '+1 years'),
            'end_date'   => $this->faker->dateTimeBetween($startDate = '+3 years', $endDate = '+4years'),
            'organizer' => $this->faker->company,
        ];
    }
}
