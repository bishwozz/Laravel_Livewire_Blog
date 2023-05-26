<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Database\Seeders\MasterSeeder;

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
        $now = Carbon::now()->toDateTimeString();
        $this->time = $now;
        
        $this->call(MasterSeeder::class);
        
    }
}
