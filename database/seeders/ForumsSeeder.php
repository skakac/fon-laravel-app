<?php

namespace Database\Seeders;

use App\Models\Forum;
use Illuminate\Database\Seeder;

class ForumsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Forum::factory()->createMany([
            [
                'id' => 1,
                'name' => 'AMD',
                'description' => 'The AMD Forum — All things Radeon, Ryzen, and more!',
            ],
            [
                'id' => 2,
                'name' => 'Intel',
                'description' => "The Intel is for enthusiasts to discuss Intel products and Intel's competition. Intel's CPUs (i5, i7, i9, etc.), Storage (Intel 665p, Optane, etc.), Networking products, and all other Intel-related topics are discussed",
            ],
            [
                'id' => 3,
                'name' => 'Nvidia',
                'description' => 'A place for everything NVIDIA, come talk about news, drivers, rumors, GPUs, the industry, show-off your build and more. This Subreddit is community run and does not represent NVIDIA in any capacity unless specified.',
            ],
        ]);
    }
}
