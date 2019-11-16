<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('themes')->insert([
            'name' => 'Cerulean',
            'url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cerulean/bootstrap.min.css',
            'isDefault' => True,
            'created_by' => 1,
            'last_modified_by' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('themes')->insert([
            'name' => 'Cosmo',
            'url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cosmo/bootstrap.min.css',
            'isDefault' => False,
            'created_by' => 1,
            'last_modified_by' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('themes')->insert([
            'name' => 'Cyborg',
            'url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cyborg/bootstrap.min.css',
            'isDefault' => False,
            'created_by' => 1,
            'last_modified_by' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('themes')->insert([
            'name' => 'Darkly',
            'url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/darkly/bootstrap.min.css',
            'isDefault' => False,
            'created_by' => 1,
            'last_modified_by' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('themes')->insert([
            'name' => 'Flatly',
            'url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/flatly/bootstrap.min.css',
            'isDefault' => False,
            'created_by' => 1,
            'last_modified_by' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('themes')->insert([
            'name' => 'Journal',
            'url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/journal/bootstrap.min.css',
            'isDefault' => False,
            'created_by' => 1,
            'last_modified_by' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('themes')->insert([
            'name' => 'Lumen',
            'url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/lumen/bootstrap.min.css',
            'isDefault' => False,
            'created_by' => 1,
            'last_modified_by' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);


    }
}
