<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // $table->bigIncrements('post_id');
        // $table->string('post_title',200);
        // $table->longText('post_desc');
        // $table->longText('post_content');
        // $table->string('post_image',255);
        // $table->integer('post_view')->default(0);
        // $table->string('post_category_id',255);
        // $table->timestamps();
        return [
            'post_title' => $this->faker->sentence(6),
            'post_desc' => $this->faker->paragraph(3),
            'post_content' => $this->faker->paragraph(10),
            'post_image' => $this->faker->imageUrl(640, 480, 'cats', true),
            'post_view' => $this->faker->numberBetween(0, 1000),
            'post_category_id' => $this->faker->numberBetween(1, 10),
            //timestamps
            'created_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
