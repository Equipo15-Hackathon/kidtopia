<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Set Bloques Magnéticos',
                'description' => '100 piezas magnéticas para crear estructuras 3D',
                'price' => 49.99,
                'stock' => 150,
                'category_id' => 1,
                'brand_id' => 5,
                'age_range_id' => 5,
                'image' => 'https://live.staticflickr.com/65535/54393768517_16055517e5_m.jpg',
            ],
            [
                'name' => 'Muñeca Interactiva Ana',
                'description' => 'Aprende palabras y canta canciones en español',
                'price' => 34.99,
                'stock' => 80,
                'category_id' => 2,
                'brand_id' => 3,
                'age_range_id' => 2,
                'image' => 'https://live.staticflickr.com/65535/54394877953_d36a0b1b12_m.jpg',
            ],
            [
                'name' => 'Pista de Coches Turbo',
                'description' => 'Circuito con 2 coches y efectos de sonido',
                'price' => 89.99,
                'stock' => 45,
                'category_id' => 3,
                'brand_id' => 7,
                'age_range_id' => 5,
                'image' => 'https://live.staticflickr.com/65535/54394832669_7184d99135_m.jpg',
            ],
            [
                'name' => 'Robot Programable XK-200',
                'description' => 'Iniciación a la robótica con 6 modos de juego',
                'price' => 129.99,
                'stock' => 60,
                'category_id' => 4,
                'brand_id' => 9,
                'age_range_id' => 6,
                'image' => 'https://live.staticflickr.com/65535/54395020130_337e9ebc59_m.jpg',
            ],
            [
                'name' => 'Kit Médico Juvenil',
                'description' => 'Maletín con 25 herramientas de juguete realistas',
                'price' => 24.99,
                'stock' => 200,
                'category_id' => 5,
                'brand_id' => 2,
                'age_range_id' => 2,
                'image' => 'https://live.staticflickr.com/65535/54394832694_7122614e1c_m.jpg',
            ],
            [
                'name' => 'Tablero Sensorial Montessori',
                'description' => 'Actividades táctiles para desarrollo cognitivo',
                'price' => 39.99,
                'stock' => 95,
                'category_id' => 6,
                'brand_id' => 10,
                'age_range_id' => 1,
                'image' => 'https://live.staticflickr.com/65535/54394648681_96ea85a275_m.jpg',
            ],
            [
                'name' => 'Laboratorio de Slime',
                'description' => 'Kit científico para crear slime brillante',
                'price' => 19.99,
                'stock' => 180,
                'category_id' => 7,
                'brand_id' => 4,
                'age_range_id' => 5,
                'image' => 'https://live.staticflickr.com/65535/54393767407_2f07f8eff6_m.jpg',
            ],
            [
                'name' => 'Castillo Inflable',
                'description' => 'Castillo medieval con espadas y escudos blandos',
                'price' => 29.99,
                'stock' => 50,
                'category_id' => 8,
                'brand_id' => 6,
                'age_range_id' => 4,
                'image' => 'https://live.staticflickr.com/65535/54394648701_2bcafd9e3d_m.jpg',
            ],
            [
                'name' => 'Telescopio Explorer',
                'description' => 'Primer telescopio infantil con soporte ajustable',
                'price' => 59.99,
                'stock' => 75,
                'category_id' => 9,
                'brand_id' => 8,
                'age_range_id' => 5,
                'image' => 'https://live.staticflickr.com/65535/54394648721_71b6bcb850_m.jpg',
            ],
            [
                'name' => 'Animales de Granja Sonoros',
                'description' => '8 peluches con sonidos realistas',
                'price' => 44.99,
                'stock' => 120,
                'category_id' => 10,
                'brand_id' => 1,
                'age_range_id' => 1,
                'image' => 'https://live.staticflickr.com/65535/54394648716_98707ef399_m.jpg',
            ],
            [
                'name' => 'Kit Arte con Luz',
                'description' => 'Mesa de luz para dibujar con arena fosforescente',
                'price' => 69.99,
                'stock' => 65,
                'category_id' => 11,
                'brand_id' => 11,
                'age_range_id' => 5,
                'image' => 'https://live.staticflickr.com/65535/54394832754_6041a21686_m.jpg',
            ],
            [
                'name' => 'Bicicleta sin Pedales',
                'description' => 'Modelo ajustable en altura (azul/rosa)',
                'price' => 89.99,
                'stock' => 40,
                'category_id' => 12,
                'brand_id' => 12,
                'age_range_id' => 2,
                'image' => 'https://live.staticflickr.com/65535/54393767477_c60ce79032_m.jpg',
            ],
            [
                'name' => 'Juego de Pesca Musical',
                'description' => 'Desarrolla coordinación mano-ojo',
                'price' => 16.99,
                'stock' => 210,
                'category_id' => 13,
                'brand_id' => 3,
                'age_range_id' => 2,
                'image' => 'https://live.staticflickr.com/65535/54394832749_a7c4d6baed_m.jpg',
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
