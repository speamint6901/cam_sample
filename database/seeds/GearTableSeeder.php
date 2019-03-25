<?php

use Illuminate\Database\Seeder;

class GearTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $brand = Brand::all()->pluck('id');
        // $genre_id = Genre::all()->pluck('id');
        factory(App\Models\Gear::class, 40)->create([
            "brand_id" => 1,
            "genre_id" => 1,
        ]);
    }
}
