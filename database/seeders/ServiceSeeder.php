<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Aprendiendo LESCO',
                'description' => 'Taller virtual diseñado para personas que desean aprender la Lengua de Señas Costarricense desde cero. Se trabajan vocabulario básico, expresiones cotidianas y cultura sorda.',
                'target_population' => 'Público general',
                'price' => 80000.00,
                'price_label' => '₡80.000',
                'images' => null,
                'order' => 1,
            ],
            [
                'title' => 'LESCO como herramienta de comunicación',
                'description' => 'Programa de 10 talleres orientado a profesionales, empresas e instituciones que desean brindar atención inclusiva a personas sordas.',
                'target_population' => 'Empresas e instituciones',
                'price' => 30000.00,
                'price_label' => '₡30.000 por persona',
                'images' => null,
                'order' => 2,
            ],
            [
                'title' => 'Cultura sorda y LESCO básico',
                'description' => 'Taller virtual que combina el aprendizaje del lenguaje de señas con una introducción profunda a la identidad y cultura de la comunidad sorda costarricense.',
                'target_population' => 'Público general e instituciones educativas',
                'price' => 90000.00,
                'price_label' => '₡90.000',
                'images' => null,
                'order' => 3,
            ],
            [
                'title' => 'Curso de LESCO Empresarial',
                'description' => 'Curso estructurado en 3 niveles con aval de la Asociación Nacional de Sordos (ANS). Ideal para organizaciones que requieren certificación. Sin matrícula.',
                'target_population' => 'Empresas y organizaciones',
                'price' => null,
                'price_label' => 'Sin matrícula — consultar precio por nivel',
                'images' => null,
                'order' => 4,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['title' => $service['title']],
                $service
            );
        }
    }
}
