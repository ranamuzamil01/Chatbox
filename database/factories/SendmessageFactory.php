<?php

namespace Database\Factories;
use App\Models\Sendmessage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sendmessage>
 */
class SendmessageFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    protected $model = Sendmessage::class;
    public function definition(): array
    {
  
            return [
                'to_id' => $this->faker->numberBetween(1, 20),
                'from_id' => $this->faker->numberBetween(1, 20),
                'message' => $this->faker->realText(20),
               
            ];
       
    }
}
