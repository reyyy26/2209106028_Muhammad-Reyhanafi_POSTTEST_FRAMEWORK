<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    public function run()
    {
        $tags = [
            'pakan lokal','vaksinasi','kompos','sapi perah','kambing etawa','peternak pemula','biosekuriti'
        ];

        foreach ($tags as $t) {
            Tag::firstOrCreate(
                ['slug' => Str::slug($t)],
                ['name' => $t]
            );
        }
    }
}
