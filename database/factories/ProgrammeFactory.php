<?php

namespace Database\Factories;

use App\Models\Channel;
use App\Models\Programme;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgrammeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Programme::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() : array
    {
        return [
            'channel_id' => Channel::factory(),
            'name' => $this->faker->name(),
            'start_time' => now(),
            'end_time' => now()->addHour(),
            'duration' => 3600
        ];
    }
}
