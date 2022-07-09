<?php

namespace Database\Seeders;

use App\Models\restaurantCategories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new restaurantCategories();
        $admin->RestaurantType = "Traditional";
        $admin->save();
    }
}
