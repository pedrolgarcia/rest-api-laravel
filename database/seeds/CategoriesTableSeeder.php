<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    // Alimentando o banco de dados na tabela categories
    public function run()
    {
        Category::create([
            'name'=>'Eletrônicos'
        ]);
        Category::create([
            'name'=>'Vestuário'
        ]);
        Category::create([
            'name'=>'Alimentação'
        ]);
        Category::create([
            'name'=>'Brinquedos'
        ]);
    }
}
