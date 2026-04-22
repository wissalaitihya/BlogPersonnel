<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;


class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::create([
            "name"=> "Mon blog",
            "email"=> "admin@blog.com",
            "password"=> bcrypt("password123"),
        ]);

        $categories=['Laravel','PHP','JavaScript','Vue.js','React'];
        foreach($categories as $name){
            Category::create([
                "name"=> $name,
                "slug"=> \Str::slug($name),
            ]);
        }
        
    }
}
