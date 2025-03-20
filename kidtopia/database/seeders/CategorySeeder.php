<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Construcción',
            'Muñecas',
            'Vehículos',
            'Robótica',
            'Rol',
            'Montessori',
            'Ciencia',
            'Exterior',
            'Astronomía',
            'Peluches',
            'Arte',
            'Deporte',
            'Habilidades',
            'Cocina',
            'Rompecabezas',
            'Electrónico',
            'Educativo',
            'Casas',
            'Música',
            'Aéreos',
            'Experimentación',
            'Bebés',
            'Naturaleza',
            'Trenes',
            'Disfraces',
            'Decoración',
            'Manualidades',
            'Juegos de Mesa',
            'Fantasía'
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
