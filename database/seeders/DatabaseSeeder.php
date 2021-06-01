<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Driver;
use App\Models\Transport;
use App\Models\TransportKind;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      Driver::factory(30)->create();
      Transport::factory(30)->create();
      TransportKind::factory(4)->create();
      User::factory(5)->create();
    }
}
