<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Product 1',
                'price' => 100,
                'quantity' => 1,
                'properties' => [
                    [
                        'name' => 'brand',
                        'value' => 'hp'
                    ],
                    [
                        'name' => 'color',
                        'value' => 'white'
                    ],
                    [
                        'name' => 'size',
                        'value' => 'medium'
                    ],
                ]
            ],
            [
                'name' => 'Product 2',
                'price' => 1000,
                'quantity' => 2,
                'properties' => [
                    [
                        'name' => 'brand',
                        'value' => 'asus'
                    ],
                    [
                        'name' => 'color',
                        'value' => 'black'
                    ],
                    [
                        'name' => 'size',
                        'value' => 'medium'
                    ],
                ]
            ],
            [
                'name' => 'Product 3',
                'price' => 10000,
                'quantity' => 3,
                'properties' => [
                    [
                        'name' => 'brand',
                        'value' => 'lenovo'
                    ],
                    [
                        'name' => 'color',
                        'value' => 'white'
                    ],
                    [
                        'name' => 'size',
                        'value' => 'medium'
                    ],
                ]
            ],
        ];

        foreach ($products as $product) {
            $model = Product::create([
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $product['quantity']
            ]);

            $model->properties()->createMany($product['properties']);
        }
    }
}
