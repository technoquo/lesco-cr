<?php

namespace Database\Seeders;

use App\Models\Alliance;
use Illuminate\Database\Seeder;

class AllianceSeeder extends Seeder
{
    public function run(): void
    {
        $alliances = [
            ['name' => 'Accenture', 'logo' => 'alianzas/acenture.jpeg', 'order' => 1],
            ['name' => 'Bellelli', 'logo' => 'alianzas/bellelli.jpeg', 'order' => 2],
            ['name' => 'Caja Costarricense de Seguro Social', 'logo' => 'alianzas/ccss.jpeg', 'order' => 3],
            ['name' => 'Citi', 'logo' => 'alianzas/citi.jpeg', 'order' => 4],
            ['name' => 'Cruz Roja Costarricense', 'logo' => 'alianzas/cruzroja.jpeg', 'order' => 5],
            ['name' => 'DXC Technology', 'logo' => 'alianzas/dxc.jpeg', 'order' => 6],
            ['name' => 'FEITEC', 'logo' => 'alianzas/feitec.jpeg', 'order' => 7],
            ['name' => 'Intel', 'logo' => 'alianzas/intel.jpeg', 'order' => 8],
            ['name' => 'Miland', 'logo' => 'alianzas/miland.jpeg', 'order' => 9],
            ['name' => "Moody's", 'logo' => 'alianzas/moodys.jpeg', 'order' => 10],
            ['name' => 'PB', 'logo' => 'alianzas/pb.jpeg', 'order' => 11],
            ['name' => 'Plura', 'logo' => 'alianzas/plura.jpg', 'order' => 12],
            ['name' => 'Popular Pensiones', 'logo' => 'alianzas/popularpensiones.jpeg', 'order' => 13],
            ['name' => 'Roche', 'logo' => 'alianzas/roche.jpeg', 'order' => 14],
            ['name' => 'UNESCO', 'logo' => 'alianzas/unesco.jpeg', 'order' => 15],
        ];

        foreach ($alliances as $alliance) {
            Alliance::updateOrCreate(
                ['name' => $alliance['name']],
                $alliance
            );
        }
    }
}
