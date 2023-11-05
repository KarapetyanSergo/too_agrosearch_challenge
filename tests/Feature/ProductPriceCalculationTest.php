<?php

namespace Tests\Feature;

use App\Models\Country;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class ProductPriceCalculationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $user = User::factory()
        ->create();

        $product = Product::factory()
        ->withUser($user)
        ->create();

        $taxNumber = 'GR123456789';
        $country = Country::where('name', 'Greece')
        ->first();

        $response = $this->get("/api/products/$product->id/calculate-price?tax_number=$taxNumber");

        $response->assertStatus(200);

        $priceFromRequest = $response->json()['price'];
        $correctPrice = $product->price + ($product->price * $country->tax_percent/100);

        assertTrue($priceFromRequest == $correctPrice);

        $user->delete();
    }
}
