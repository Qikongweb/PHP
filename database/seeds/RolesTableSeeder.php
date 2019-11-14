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
            'name' => 'post_moderator',

        ]);
        DB::table('roles')->insert([
            'name' => 'theme_manager',

        ]);
        DB::table('roles')->insert([
            'name' => 'user_administrators',

        ]);
    }
}
