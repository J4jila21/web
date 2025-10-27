<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
            'name' => 'kopi toraja',
            'description' => 'kopi toraja adalah kpi yang enak dengan sentuhan rasa yang minimalis',
            'price' => 100000,
            'quantity' => 20,
            'image' => 'jus.png',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'kopi gayo',
            'description' => 'kopi khas adalah kopi pahit',
            'price' => 100000,
            'quantity' => 40,
            'image' => 'jeruk.webp',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'kopi arabica',
            'description' => 'kopi khas adalah kpi yang enak dengan sentuhan rasa asam',
            'price' => 100000,
            'quantity' => 70,
            'image' => 'test.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'kopi aceh',
            'description' => 'kopi khas adalah kpi yang manis',
            'price' => 100000,
            'quantity' => 30,
            'image' => '1.webp',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'kopi batam',
            'description' => 'kopi khas adalah kpi yang enak dengan sentuhan rasa',
            'price' => 100000,
            'quantity' => 5,
            'image' => 'test1.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'kopi obeng',
            'description' => 'kopi khas adalah kpi yang enak',
            'price' => 100000,
            'quantity' => 10,
            'image' => 'test2.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'kopi old',
            'description' => 'kopi khas adalah kopi dengan nuansa rasa pahit dan asam',
            'price' => 100000,
            'quantity' => 50,
            'image' => 'test3.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'kopi now',
            'description' => 'kopi khas adalah kpi ganteng',
            'price' => 100000,
            'quantity' => 60,
            'image' => 'test4.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'kopi luwak',
            'description' => 'kopi khas adalah kpi yang khas',    
            'price' => 100000,
            'quantity' => 30,    
            'image' => 'test6.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
            ],
        ]);
    }
}
