<?php

namespace Database\Seeders;

use App\Models\Forum;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->createMany([
            [
                'id' => 1,
                'username' => 'dusan',
                'email' => 'dusan@test.com',
            ],
            [
                'id' => 2,
                'username' => 'marko',
                'email' => 'marko@test.com',
            ],
        ]);
    }
}
