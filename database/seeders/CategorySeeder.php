<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Leads']);
        Category::create(['name' => 'Pending']);
        Category::create(['name' => 'Admission']);
        Category::create(['name' => 'Visa Compliance']);
    }
}
