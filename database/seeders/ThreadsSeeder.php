<?php

namespace Database\Seeders;

use App\Models\Thread;
use Illuminate\Database\Seeder;

class ThreadsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Thread::factory()->createMany([
            [
                'name' => 'Novi Ryzen procesori',
                'forum_id' => 1,
                'user_id' => 1,
            ],
            [
                'name' => 'RX 6000XT graficke',
                'forum_id' => 1,
                'user_id' => 1,
            ],
            [
                'name' => 'Intel cena',
                'forum_id' => 2,
                'user_id' => 2,
            ],
            [
                'name' => 'RTX kartice',
                'forum_id' => 3,
                'user_id' => 2,
            ],
        ]);
    }
}
