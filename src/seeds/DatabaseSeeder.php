<?php

namespace Restserver\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'name' => 'Produkt 1',
            'amount' => 4
        ]);
        
        DB::table('items')->insert([
            'name' => 'Produkt 2',
            'amount' => 12
        ]);
        
        DB::table('items')->insert([
            'name' => 'Produkt 5',
            'amount' => 0
        ]);
        
        DB::table('items')->insert([
            'name' => 'Produkt 7',
            'amount' => 6
        ]);
        
        DB::table('items')->insert([
            'name' => 'Produkt 8',
            'amount' => 2
        ]);
    }
}
