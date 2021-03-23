<?php

namespace Database\Seeders;

use App\Models\Customers;
use App\Models\Projects;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        Db::table('customers')->truncate();
        Db::table('projects')->truncate();

        Customers::factory(86)->create();
        Projects::factory(127)->create();

        Schema::enableForeignKeyConstraints();
    }
}
