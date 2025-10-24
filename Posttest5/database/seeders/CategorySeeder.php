<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $cats = [
            'Teknik Pakan',
            'Kesehatan Ternak',
            'Manajemen Peternakan',
            'Pupuk & Lingkungan',
            'Bisnis & Pemasaran'
        ];

        foreach ($cats as $c) {
            Category::firstOrCreate(
                ['slug' => Str::slug($c)],
                ['name' => $c]
            );
        }
    }
}
