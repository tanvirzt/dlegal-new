<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DomainSetupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'domain_name' => $this->faker->url(),
            'company_id' => '1',
            'company_logo' => $this->faker->imageUrl(60,60),
        ];
    }
}
