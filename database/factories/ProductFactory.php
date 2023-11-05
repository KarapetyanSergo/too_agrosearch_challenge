<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    protected User $user;

    public function withUser(User $user): ProductFactory
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = $this->user ?? User::all()->random()->id;

        return [
            'user_id' => $user->id,
            'name' => fake()->name(),
            'price' => rand(100, 1000)
        ];
    }
}
