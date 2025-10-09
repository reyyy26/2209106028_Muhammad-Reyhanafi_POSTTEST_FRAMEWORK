<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Animal;

class AnimalSeeder extends Seeder
{
    public function run()
    {
        $samples = [
            [
                'name' => 'Mawar',
                'species' => 'Cow',
                'breed' => 'Brahman',
                'age' => 4,
                'description' => 'Sapi perah produktif, sering diperah dua kali sehari.',
                'image_url' => 'https://placehold.co/600x400?text=Brahman+Cow',
            ],
            [
                'name' => 'Kresna',
                'species' => 'Goat',
                'breed' => 'Kambing Etawa',
                'age' => 2,
                'description' => 'Kambing untuk pengembangan peternakan kecil.',
                'image_url' => 'https://placehold.co/600x400?text=Etawa+Goat',
            ],
            [
                'name' => 'Putri',
                'species' => 'Sheep',
                'breed' => 'Texel',
                'age' => 5,
                'description' => 'Domba potong, kondisi sehat dan gemuk.',
                'image_url' => 'https://placehold.co/600x400?text=Texel+Sheep',
            ],
            [
                'name' => 'Cemara',
                'species' => 'Chicken',
                'breed' => 'Rhode Island Red',
                'age' => 1,
                'description' => 'Ayam petelur, mampu menghasilkan telur hampir setiap hari.',
                'image_url' => 'https://placehold.co/600x400?text=RIR+Chicken',
            ],
            [
                'name' => 'Bima',
                'species' => 'Duck',
                'breed' => 'Pekin',
                'age' => 3,
                'description' => 'Bebek untuk pengembangan usaha telur bebek.',
                'image_url' => 'https://placehold.co/600x400?text=Pekin+Duck',
            ],
            [
                'name' => 'Srikandi',
                'species' => 'Cow',
                'breed' => 'Limousin',
                'age' => 7,
                'description' => 'Sapi potong dewasa.',
                'image_url' => 'https://placehold.co/600x400?text=Limousin+Cow',
            ],
        ];

        foreach ($samples as $s) {
            Animal::create($s);
        }
    }
}
