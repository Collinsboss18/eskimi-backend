<?php

namespace Database\Factories;

use App\Models\Advert;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdvertFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Advert::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name(),
            "total_budget" => 30000,
            "daily_budget" => 200,
            "image" => "https://image.tmdb.org/t/p/original/bkld8Me0WiLWipLORRNfF1yIPHu.jpg"
        ];
    }
}
