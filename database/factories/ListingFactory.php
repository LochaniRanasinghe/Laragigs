<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //id,title,tags,company,location,email,website,description
            'title' => $this->faker->sentence(),
            'tags' => 'PHP, Laravel, Database',
            'company' => $this->faker->company(),
            'location' => $this->faker->city(),
            'email' => $this->faker->companyemail(),
            'website' => $this->faker->url(),
            'description' => $this->faker->paragraph(5),
        ];
    }
}