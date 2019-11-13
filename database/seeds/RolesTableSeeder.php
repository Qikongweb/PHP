<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert([
            'type' => 'post_moderator',

        ]);
        DB::table('roles')->insert([
            'type' => 'theme_manager',

        ]);
        DB::table('roles')->insert([
            'type' => 'user_administrators',

        ]);
    }
}
