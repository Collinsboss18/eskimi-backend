<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdvertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advert')->insert([
            "name" => $this->faker->name(),
            "total_budget" => 10000,
            "daily_budget" => 200,
            "image" => "https://image.tmdb.org/t/p/original/bkld8Me0WiLWipLORRNfF1yIPHu.jpg"
        ]);
    }
}
