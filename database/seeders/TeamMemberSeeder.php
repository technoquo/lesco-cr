<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        // Contenido real pendiente de confirmar con el usuario (ver design.md §9).
        // Esta estructura queda lista para poblar una vez confirmados los datos.
        $members = [
            [
                'name' => 'Por confirmar',
                'role' => 'Por confirmar',
                'bio' => null,
                'photo' => null,
                'order' => 1,
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
