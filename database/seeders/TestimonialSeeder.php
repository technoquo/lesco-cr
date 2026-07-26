<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'María González',
                'role' => 'Docente de educación especial',
                'photo' => null,
                'content' => 'Gracias a LESCO por Costa Rica pude comunicarme con mis estudiantes sordos de una manera que nunca antes había logrado. El taller cambió mi perspectiva profesional y personal.',
                'order' => 1,
            ],
            [
                'name' => 'Carlos Vargas',
                'role' => 'Profesional de recursos humanos',
                'photo' => null,
                'content' => 'El curso empresarial nos permitió capacitar a todo el equipo. Ahora nuestra empresa puede atender a clientes sordos con respeto e inclusión real.',
                'order' => 2,
            ],
            [
                'name' => 'Ana Jiménez',
                'role' => 'Estudiante universitaria',
                'photo' => null,
                'content' => 'Aprender LESCO fue una de las mejores decisiones de mi vida. Los instructores son increíbles y la metodología hace que sea fácil y divertido aprender.',
                'order' => 3,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::updateOrCreate(
                ['name' => $testimonial['name']],
                $testimonial
            );
        }
    }
}
