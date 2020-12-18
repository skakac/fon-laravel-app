<?php

namespace Database\Seeders;

use App\Models\Thread;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ForumsSeeder::class,
            UsersSeeder::class,
            ThreadsSeeder::class,
            MessagesSeeder::class,
        ]);
    }
}
