<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert(
            ['nome' => 'Camiseta Polo', 'preco'=>100, 'estoque'=>4,'categoria_id'=>1]
        );
        DB::table('produtos')->insert(
            ['nome' => 'Calça Jeans', 'preco'=>250, 'estoque'=>2,'categoria_id'=>1]
        );
        DB::table('produtos')->insert(
            ['nome' => 'Camiseta Manga longa', 'preco'=>180, 'estoque'=>2,'categoria_id'=>1]
        );
        DB::table('produtos')->insert(
            ['nome' => 'PC Gamer', 'preco'=>5000, 'estoque'=>2,'categoria_id'=>6]
        );
        DB::table('produtos')->insert(
            ['nome' => 'Monitor Gamer', 'preco'=>2000, 'estoque'=>8,'categoria_id'=>6]
        );
        DB::table('produtos')->insert(
            ['nome' => 'Perfume', 'preco'=>450, 'estoque'=>8,'categoria_id'=>3]
        );
        DB::table('produtos')->insert(
            ['nome' => 'Cama de Casal', 'preco'=>4500, 'estoque'=>18,'categoria_id'=>4]
        );
    }
}
