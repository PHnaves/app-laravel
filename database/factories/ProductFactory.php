<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nome = fake()->unique()->sentence();
        return [
            'name' => $nome,
            'description' => fake()->text(),
            'price' => fake()->randomNumber(2),
            'slug' => str_replace(' ', '-', $nome),
            'image' => fake()->imageUrl(400, 400),
            'id_user' => User::pluck('id')->random(),
            'id_category' => Category::pluck('id')->random(),
        ];
    }
}
