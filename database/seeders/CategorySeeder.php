<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            "Fashion",
            "Corporate blog",
            "Business",
            "Food blogging",
            "Travel",
            "Sports",
            "Lifestyle",
            "Parenting Blogs",
            "Affiliate marketing",
            "Financial Blogs",
            "Fashion blog",
            "Beauty Blogs",
            "Health blog",
            "Narrative"
        ];

        foreach ($categories as  $value) {
            DB::table('categories')->insert([
                'name' =>  $value,
            ]);
        }
    }
}
