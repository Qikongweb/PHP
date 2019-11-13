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
            'name' => 'Mike',
            'email' => 'mike'.'@gmail.com',
            'password' => bcrypt('password'),
            'created_by' => 'Mike',
            'last_modified_by' => 'Mike',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Claire',
            'email' => 'claire'.'@gmail.com',
            'password' => bcrypt('password'),
            'created_by' => 'Claire',
            'last_modified_by' => 'Claire',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Joe',
            'email' => 'joe'.'@gmail.com',
            'password' => bcrypt('password'),
            'created_by' => 'Joe',
            'last_modified_by' => 'Joe',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'test'.'@example.com',
            'password' => bcrypt('password'),
            'created_by' => 'test',
            'last_modified_by' => 'test',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);
    }
}
