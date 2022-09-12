<?php

namespace Database\Factories;

use App\Models\Center;
use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $centers = Center::pluck('id')->toArray();
        return [
            'center_id' => fake()->randomElement($centers),
            'product_id' => Product::factory()->create()->id,
            'quantity' => random_int(1, 500)
        ];
    }
}
