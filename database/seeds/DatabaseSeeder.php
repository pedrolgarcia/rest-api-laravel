<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Descomente para chamar os seeders criados
        //$this->call(CategoriesTableSeeder::class);
        //$this->call(ProductsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}