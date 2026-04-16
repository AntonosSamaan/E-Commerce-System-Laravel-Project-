<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdudctSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Product::create([
            'name'=>'product one',
            'desc'=>'desc product one',
            'price'=>'20000',
            'quantity'=>'6',
        ]);
            Product::create([
            'name'=>'product tow',
            'desc'=>'desc product tow',
            'price'=>'40000',
            'quantity'=>'5',
        ]);
    }
}

