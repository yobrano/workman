<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $faker = Faker::create();
        $pname = $faker->randomElement(['Essential home services', 'Oitdoor upkeep','Healthy at home','Do it all from home','Learn something new']);
    	foreach (range(1,200) as $index) {
            DB::table('projects')->insert([
                'project_name' => $faker->name($pname),
                'project_detail' => $faker->text,
                'project_image_path' => $faker->image
                // 'phone' => $faker->phoneNumber,
                // 'dob' => $faker->date($format = 'Y-m-d', $max = 'now')
            ]);
        }
    }
}
