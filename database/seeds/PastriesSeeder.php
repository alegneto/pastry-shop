<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PastriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pastries')->insert([
            'name' => 'Queijo',
            'price' => 5.50,
            'picture' => 'pastel-queijo.png'
        ]);

        DB::table('pastries')->insert([
            'name' => 'Carne',
            'price' => 4.50,
            'picture' => 'pastel-carne.png'
        ]);

        DB::table('pastries')->insert([
            'name' => 'Pizza',
            'price' => 5.50,
            'picture' => 'pastel-pizza.png'
        ]);

        DB::table('pastries')->insert([
            'name' => 'Frango Catupiry',
            'price' => 6.50,
            'picture' => 'pastel-frango-catupiry.png'
        ]);

        DB::table('pastries')->insert([
            'name' => 'Camarão',
            'price' => 7.50,
            'picture' => 'pastel-camarao.png'
        ]);

        DB::table('pastries')->insert([
            'name' => 'Palmito',
            'price' => 6.00,
            'picture' => 'pastel-palmito.png'
        ]);
    }
}
