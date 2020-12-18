<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Seeder;

class MessagesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Message::factory()->createMany([
            [
                'thread_id' => 1,
                'user_id' => 1,
            ],
            [
                'thread_id' => 1,
                'user_id' => 2,
            ],
            [
                'thread_id' => 1,
                'user_id' => 1,
            ],
            [
                'thread_id' => 2,
                'user_id' => 1,
            ],
            [
                'thread_id' => 3,
                'user_id' => 2,
            ],
            [
                'thread_id' => 4,
                'user_id' => 2,
            ],
        ]);
    }
}
