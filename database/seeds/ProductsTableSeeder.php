<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    // Alimentando o banco de dados na tabela products
    public function run()
    {
        Product::create([
            'cod'=>'A-123',
            'name'=>'Iphone X',
            'description'=>'Smarthphone Apple',
            'price'=>8000.00,
            'category_id'=>1
        ]);
        Product::create([
            'cod'=>'A-456',
            'name'=>'Galaxy S9',
            'description'=>'Smarthphone Samsung',
            'price'=>4999.00,
            'category_id'=>1
        ]);
        Product::create([
            'cod'=>'A-789',
            'name'=>'Playstation 4',
            'description'=>'Console Sony',
            'price'=>2200.00,
            'category_id'=>1
        ]);
        Product::create([
            'cod'=>'B-123',
            'name'=>'Casaco',
            'description'=>'Moletom, cor preta',
            'price'=>50.00,
            'category_id'=>2
        ]);
        Product::create([
            'cod'=>'C-123',
            'name'=>'Pizza',
            'description'=>'Calabresa',
            'price'=>25.00,
            'category_id'=>3
        ]);
    }
}
