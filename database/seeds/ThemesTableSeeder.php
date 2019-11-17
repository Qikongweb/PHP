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
            'name' => 'Bootswatch - Cerulean',
            'url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cerulean/bootstrap.min.css',
            'isDefault' => False,
            'created_by' => 1,
            'last_modified_by' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('themes')->insert([
            'name' => 'Bootswatch - Cosmo',
            'url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cosmo/bootstrap.min.css',
            'isDefault' => False,
            'created_by' => 1,
            'last_modified_by' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('themes')->insert([
            'name' => 'Bootswatch - Cyborg',
            'url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cyborg/bootstrap.min.css',
            'isDefault' => False,
            'created_by' => 1,
            'last_modified_by' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('themes')->insert([
            'name' => 'Bootswatch - Darkly',
            'url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/darkly/bootstrap.min.css',
            'isDefault' => True,
            'created_by' => 1,
            'last_modified_by' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('themes')->insert([
            'name' => 'Bootswatch - Flatly',
            'url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/flatly/bootstrap.min.css',
            'isDefault' => False,
            'created_by' => 1,
            'last_modified_by' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('themes')->insert([
            'name' => 'Bootswatch - Journal',
            'url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/journal/bootstrap.min.css',
            'isDefault' => False,
            'created_by' => 1,
            'last_modified_by' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('themes')->insert([
            'name' => 'Bootswatch - Lumen',
            'url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/lumen/bootstrap.min.css',
            'isDefault' => False,
            'created_by' => 1,
            'last_modified_by' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('themes')->insert([
            'name' => 'Bootswatch - Lux',
            'url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/lux/bootstrap.min.css',
            'isDefault' => False,
            'created_by' => 1,
            'last_modified_by' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('themes')->insert([
            'name' => 'Bootswatch - Materia',
            'url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/materia/bootstrap.min.css',
            'isDefault' => False,
            'created_by' => 1,
            'last_modified_by' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('themes')->insert([
            'name' => 'Bootswatch - Pulse',
            'url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/pulse/bootstrap.min.css',
            'isDefault' => False,
            'created_by' => 1,
            'last_modified_by' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('themes')->insert([
            'name' => 'Bootswatch - Sandstone',
            'url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/sandstone/bootstrap.min.css',
            'isDefault' => False,
            'created_by' => 1,
            'last_modified_by' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('themes')->insert([
            'name' => 'Bootswatch - simplex',
            'url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/simplex/bootstrap.min.css',
            'isDefault' => False,
            'created_by' => 1,
            'last_modified_by' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('themes')->insert([
            'name' => 'Bootswatch - Sketchy',
            'url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/sketchy/bootstrap.min.css',
            'isDefault' => False,
            'created_by' => 1,
            'last_modified_by' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('themes')->insert([
            'name' => 'Bootswatch - Slate',
            'url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/slate/bootstrap.min.css',
            'isDefault' => False,
            'created_by' => 1,
            'last_modified_by' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('themes')->insert([
            'name' => 'Bootswatch - Solar',
            'url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/solar/bootstrap.min.css',
            'isDefault' => False,
            'created_by' => 1,
            'last_modified_by' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('themes')->insert([
            'name' => 'Bootswatch - Spacelab',
            'url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/spacelab/bootstrap.min.css',
            'isDefault' => False,
            'created_by' => 1,
            'last_modified_by' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('themes')->insert([
            'name' => 'Bootswatch - Superhero',
            'url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/superhero/bootstrap.min.css',
            'isDefault' => False,
            'created_by' => 1,
            'last_modified_by' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('themes')->insert([
            'name' => 'Bootswatch - United',
            'url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/united/bootstrap.min.css',
            'isDefault' => False,
            'created_by' => 1,
            'last_modified_by' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('themes')->insert([
            'name' => 'Bootswatch - Yeti',
            'url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/yeti/bootstrap.min.css',
            'isDefault' => False,
            'created_by' => 1,
            'last_modified_by' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);


    }
}
