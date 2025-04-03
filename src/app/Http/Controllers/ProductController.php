<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Http\Requests\ProductFilterRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    const PER_PAGE = 40;

    /**
     * @param ProductFilterRequest $request
     * @return AnonymousResourceCollection
     */
    public function index(ProductFilterRequest $request)
    {
        $products = Product::with('properties');
        $properties = $request->validated('properties', []);

        foreach ($properties as $property_name => $values) {
            $products->whereHas('properties', function ($q) use ($property_name, $values) {
                $q->where('name', $property_name)->whereIn('value', $values);
            });
        }

        $paginator = $products->simplePaginate(self::PER_PAGE);

        return ProductResource::collection($paginator);
    }
}
