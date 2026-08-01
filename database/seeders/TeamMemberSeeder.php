<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'name' => 'Jeremy Chacón Bermúdez',
                'role' => 'Director de LESCO X CR',
                'bio' => null,
                'photo' => 'imported/jeremy.jpeg',
                'order' => 1,
            ],
            [
                'name' => 'Valerie Calderón Guillén',
                'role' => 'Directora de LESCO X CR',
                'bio' => null,
                'photo' => 'imported/valeria.jpeg',
                'order' => 2,
            ],
        ];

        foreach ($members as $member) {
            TeamMember::updateOrCreate(
                ['name' => $member['name']],
                $member
            );
        }
    }
}
