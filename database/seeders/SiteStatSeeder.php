<?php

namespace Database\Seeders;

use App\Models\SiteStat;
use Illuminate\Database\Seeder;

class SiteStatSeeder extends Seeder
{
    public function run(): void
    {
        $stats = [
            ['key' => 'students',  'label' => 'Estudiantes',      'value' => 500],
            ['key' => 'hours',     'label' => 'Horas invertidas', 'value' => 2000],
            ['key' => 'workshops', 'label' => 'Talleres',         'value' => 80],
        ];

        foreach ($stats as $stat) {
            SiteStat::updateOrCreate(
                ['key' => $stat['key']],
                $stat
            );
        }
    }
}
