<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Animal;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    protected $model = Animal::class;
    
    public function definition()
    {
        return [
            'name' => $this->faker->firstName() . ' ' . $this->faker->randomElement([' the Cow',' the Goat',' the Sheep']),
            'species' => $this->faker->randomElement(['Cow','Goat','Sheep','Chicken','Duck']),
            'breed' => $this->faker->word(),
            'age' => $this->faker->numberBetween(1,10),
            'description' => $this->faker->sentence(10),
            'image_url' => null
        ];
    }
}

