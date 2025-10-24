<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // urutan penting: categories & tags dulu, lalu articles yang butuh relasi
        $this->call([
            CategorySeeder::class,
            TagSeeder::class,
            ArticleSeeder::class,
            AnimalSeeder::class,
            VeterinaryRecordSeeder::class,
        ]);
    }
}
