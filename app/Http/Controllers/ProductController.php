<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculatePriceRequest;
use App\Http\Requests\GetProductListRequest;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function index(GetProductListRequest $request): JsonResponse
    {
        $products = Product::skipPage($request->only(['limit_rows', 'page']))
        ->take($request->limit_rows)
        ->get();

        return response()->json([
            'products' => $products
        ]);
    }

    public function store(StoreProductRequest $request, ProductService $service): JsonResponse
    {
        $product = $service->createProduct(auth()->user(), $request->name, $request->price);

        return response()->json([
            'product' => $product
        ]);
    }

    public function calculatePrice(CalculatePriceRequest $request, Product $product, ProductService $service): JsonResponse
    {
        $country = $service->getCountryByTaxNumber($request->tax_number);

        if (!$country) {
            return response()->json([
                'message' => 'Wrong tax number'
            ], 400);
        }

        return response()->json([
            'price' => $service->getProductPrice($product, $country)
        ]);
    }
}
