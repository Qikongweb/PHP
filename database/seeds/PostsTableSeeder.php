<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'Tara National Park',
            'caption' => 'Travel Guide for Visiting the Lungs of Serbia',
            'image_url' => 'https://drifterplanet.com/wp-content/uploads/2019/01/Banjska-Stena-Tara-National-Park-in-Serbia-near-Mokra-Gora-2.jpg',
            'created_by' => 1,
            'last_modified_by' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('posts')->insert([
            'title' => 'Prague Travel Tips',
            'caption' => ' 21 Things You Need to Know Before Visiting the Czech Capital',
            'image_url' => 'https://drifterplanet.com/wp-content/uploads/2018/08/Prague-Travel-Tips-things-you-need-to-know-before-visiting-400x250.jpg',
            'created_by' => 1,
            'last_modified_by' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('posts')->insert([
            'title' => 'Pamukkale in Turkey',
            'caption' => ' Spectacular Travertine Thermal Pools ',
            'image_url' => 'https://drifterplanet.com/wp-content/uploads/2018/01/Pamukkale-Thermal-Pools-Travel-Guide-Hierapolis-400x250.jpg',
            'created_by' => 1,
            'last_modified_by' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('posts')->insert([
            'title' => 'Hamburg',
            'caption' => '20 Fun Things to do in Hamburg, Germany',
            'image_url' => 'https://drifterplanet.com/wp-content/uploads/2017/07/Hamburg-Germany-400x250.jpg',
            'created_by' => 1,
            'last_modified_by' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);
    }

}
