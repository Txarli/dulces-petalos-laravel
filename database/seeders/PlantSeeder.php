<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PlantSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('plants')->insert([
            [
                'name' => 'Aloe Vera',
                'binomial_name' => 'Aloe barbadensis',
                'price' => 12.99,
                'img_url' => url('images/plants/aloe-vera.webp'),
                'waterings_per_week' => 1,
                'fertilizer_type' => 'phosphorus',
                'height_in_cm' => 30,
            ],
            [
                'name' => 'Monstera',
                'binomial_name' => 'Monstera deliciosa',
                'price' => 25.50,
                'img_url' => url('images/plants/monstera.webp'),
                'waterings_per_week' => 2,
                'fertilizer_type' => 'nitrogen',
                'height_in_cm' => 100,
            ],
            [
                'name' => 'Lavanda',
                'binomial_name' => 'Lavandula angustifolia',
                'price' => 9.75,
                'img_url' => url('images/plants/lavanda.webp'),
                'waterings_per_week' => 1,
                'fertilizer_type' => 'phosphorus',
                'height_in_cm' => 40,
            ],
            [
                'name' => 'Cactus San Pedro',
                'binomial_name' => 'Echinopsis pachanoi',
                'price' => 19.99,
                'img_url' => url('images/plants/san-pedro.webp'),
                'waterings_per_week' => 1,
                'fertilizer_type' => 'nitrogen',
                'height_in_cm' => 80,
            ],
            [
                'name' => 'Orquídea Phalaenopsis',
                'binomial_name' => 'Phalaenopsis spp.',
                'price' => 29.99,
                'img_url' => url('images/plants/orquidea.webp'),
                'waterings_per_week' => 2,
                'fertilizer_type' => 'phosphorus',
                'height_in_cm' => 50,
            ],
            [
                'name' => 'Helecho de Boston',
                'binomial_name' => 'Nephrolepis exaltata',
                'price' => 14.50,
                'img_url' => url('images/plants/helecho.webp'),
                'waterings_per_week' => 3,
                'fertilizer_type' => 'nitrogen',
                'height_in_cm' => 45,
            ],
            [
                'name' => 'Jazmín',
                'binomial_name' => 'Jasminum officinale',
                'price' => 22.00,
                'img_url' => url('images/plants/jazmin.webp'),
                'waterings_per_week' => 3,
                'fertilizer_type' => 'phosphorus',
                'height_in_cm' => 60,
            ],
            [
                'name' => 'Poto',
                'binomial_name' => 'Epipremnum aureum',
                'price' => 15.25,
                'img_url' => url('images/plants/poto.webp'),
                'waterings_per_week' => 2,
                'fertilizer_type' => 'nitrogen',
                'height_in_cm' => 70,
            ],
            [
                'name' => 'Bonsái Ficus',
                'binomial_name' => 'Ficus retusa',
                'price' => 45.00,
                'img_url' => url('images/plants/bonsai-ficus.webp'),
                'waterings_per_week' => 2,
                'fertilizer_type' => 'phosphorus',
                'height_in_cm' => 25,
            ],
            [
                'name' => 'Calathea',
                'binomial_name' => 'Calathea spp.',
                'price' => 18.75,
                'img_url' => url('images/plants/calathea.webp'),
                'waterings_per_week' => 3,
                'fertilizer_type' => 'nitrogen',
                'height_in_cm' => 50,
            ],
            [
                'name' => 'Palmera Areca',
                'binomial_name' => 'Dypsis lutescens',
                'price' => 39.99,
                'img_url' => url('images/plants/areca.webp'),
                'waterings_per_week' => 2,
                'fertilizer_type' => 'phosphorus',
                'height_in_cm' => 120,
            ],
            [
                'name' => 'Cinta',
                'binomial_name' => 'Chlorophytum comosum',
                'price' => 10.99,
                'img_url' => url('images/plants/cinta.webp'),
                'waterings_per_week' => 2,
                'fertilizer_type' => 'nitrogen',
                'height_in_cm' => 30,
            ],
        ]);
    }
}

