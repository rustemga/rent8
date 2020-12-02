<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\Rents;
use Illuminate\Database\Eloquent\Factories\Factory;

class categoriesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Categories::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'description' => $this->faker->paragraph,
        ];
    }
}
