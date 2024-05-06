<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=ProductSeeder
     */
    public function run(): void
    {
        $productTypesData = [
            ['name' => 'Type 1', 'production_speed' => 715],
            ['name' => 'Type 2', 'production_speed' => 770],
            ['name' => 'Type 3', 'production_speed' => 1000],
        ];

        foreach ($productTypesData as $typeData) {
            ProductType::create($typeData);
        }

        $productsData = [
            ['name' => 'Product A', 'type_id' => 1],
            ['name' => 'Product B', 'type_id' => 1],
            ['name' => 'Product C', 'type_id' => 2],
            ['name' => 'Product D', 'type_id' => 3],
            ['name' => 'Product E', 'type_id' => 3],
            ['name' => 'Product F', 'type_id' => 1],
        ];

        foreach ($productsData as $productData) {
            Product::create($productData);
        }
    }
}
