<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            SiteStatSeeder::class,
            ServiceSeeder::class,
            TestimonialSeeder::class,
            TeamMemberSeeder::class,
            PostSeeder::class,
            AllianceSeeder::class,
        ]);
    }
}
