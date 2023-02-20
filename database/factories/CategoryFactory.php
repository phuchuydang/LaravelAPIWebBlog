<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // $table->bigIncrements('category_id');
            // $table->string('category_title',200);
            // $table->mediumText('category_desc');
            // $table->timestamps();
            'category_title' => $this->faker->sentence(3),
            'category_desc' => $this->faker->paragraph(3),
            //timestamps
            'created_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
