<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        // Pastikan categories & tags sudah ada (jalankan CategorySeeder & TagSeeder terlebih dahulu)
        $c1 = Category::firstOrCreate(['slug'=>'teknik-pakan'], ['name'=>'Teknik Pakan']);
        $c2 = Category::firstOrCreate(['slug'=>'kesehatan-ternak'], ['name'=>'Kesehatan Ternak']);
        $c3 = Category::firstOrCreate(['slug'=>'pupuk-lingkungan'], ['name'=>'Pupuk & Lingkungan']);

        $t1 = Tag::firstOrCreate(['slug'=>'pakan-lokal'], ['name'=>'pakan lokal']);
        $t2 = Tag::firstOrCreate(['slug'=>'vaksinasi'], ['name'=>'vaksinasi']);
        $t3 = Tag::firstOrCreate(['slug'=>'kompos'], ['name'=>'kompos']);
        $t4 = Tag::firstOrCreate(['slug'=>'sapi-perah'], ['name'=>'sapi perah']);

        $samples = [
            [
                'title' => 'Teknik Pakan Hemat untuk Peternak Kecil',
                'excerpt' => 'Strategi mencampur pakan lokal agar nutrisi tercukupi tanpa biaya tinggi.',
                'content' => "Pelajari metode pencampuran pakan dengan bahan lokal seperti dedak, ampas tebu, dan hijauan.",
                'author' => 'Admin Nyxx Farm',
                'published_at' => Carbon::now()->subDays(7),
                'category' => $c1,
                'tags' => [$t1->id]
            ],
            [
                'title' => 'Pencegahan Penyakit Umum pada Sapi Perah',
                'excerpt' => 'Langkah preventif untuk menjaga produksi susu tetap stabil.',
                'content' => 'Penerapan biosekuriti, jadwal vaksinasi, dan tanda-tanda awal penyakit yang harus diwaspadai.',
                'author' => 'Drh. Siti',
                'published_at' => Carbon::now()->subDays(3),
                'category' => $c2,
                'tags' => [$t2->id, $t4->id]
            ],
            [
                'title' => 'Pemanfaatan Kotoran Ternak sebagai Pupuk Organik',
                'excerpt' => 'Cara mengolah kotoran ternak menjadi pupuk kompos berkualitas.',
                'content' => 'Langkah pembuatan kompos, rasio C:N, dan penggunaan pada lahan pertanian.',
                'author' => 'Tim Penyuluh',
                'published_at' => Carbon::now()->subDay(),
                'category' => $c3,
                'tags' => [$t3->id]
            ],
        ];

        foreach ($samples as $s) {
            $s['slug'] = Str::slug($s['title']) . '-' . Str::random(4);
            $category = $s['category'];
            $tagIds = $s['tags'] ?? [];

            // create article
            $article = Article::create([
                'title' => $s['title'],
                'slug' => $s['slug'],
                'excerpt' => $s['excerpt'],
                'content' => $s['content'],
                'author' => $s['author'],
                'published_at' => $s['published_at'],
                'category_id' => $category->id,
            ]);

            // attach tags
            if (!empty($tagIds)) {
                $article->tags()->sync($tagIds);
            }
        }
    }
}
