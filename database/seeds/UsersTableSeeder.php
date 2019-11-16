<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Claire_admin',
            'email' => 'claire'.'@example.com',
            'password' => bcrypt('123456'),
            'created_by' => 1,
            'last_modified_by' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Mike_admin',
            'email' => 'mike'.'@example.com',
            'password' => bcrypt('123456'),
            'created_by' => 2,
            'last_modified_by' => 2,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Woojin_admin',
            'email' => 'Woojin'.'@example.com',
            'password' => bcrypt('123456'),
            'created_by' => 3,
            'last_modified_by' => 3,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Hana_admin',
            'email' => 'hana'.'@example.com',
            'password' => bcrypt('123456'),
            'created_by' => 4,
            'last_modified_by' => 4,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Joe',
            'email' => 'Joe'.'@example.com',
            'password' => bcrypt('123456'),
            'created_by' => 5,
            'last_modified_by' => 5,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);
    }
}
