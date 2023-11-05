<?php

namespace App\Services;

use App\Models\Country;
use App\Models\Product;
use App\Models\User;

class ProductService
{
    public function createProduct(User $user, string $name, float $price): Product
    {
        return Product::create([
            'user_id' => $user->id,
            'name' => $name,
            'price' => $price
        ]);
    }

    public function getProductPrice(Product $product, Country $country): float
    {
        return $product->price + ($product->price * $country->tax_percent/100);
    }

    public function getCountryByTaxNumber(string $taxNumber): ?Country
    {
        $taxFormat = substr($taxNumber, 0, 2).preg_replace('/[0-9]/', 'X', preg_replace('/[a-zA-Z]/', 'Y', substr($taxNumber, 2)));

        return Country::where('tax_format', $taxFormat)
            ->first();
    }
}
