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
                'content' => "Untuk menghemat biaya pakan, peternak kecil dapat memanfaatkan bahan pakan lokal seperti hijauan (rumput gajah, daun singkong), limbah pertanian (jerami padi, dedak), dan hasil samping agroindustri (ampas tahu, onggok), serta mengolahnya dengan teknik fermentasi atau pengeringan untuk meningkatkan nilai nutrisi dan daya simpannya. Selain itu, peternak dapat meramu pakan sendiri dari bahan-bahan yang terjangkau di sekitar lokasi dan mengatur jadwal pemberian pakan agar efisien.",
                'author' => 'Admin Nyxx Farm',
                'published_at' => Carbon::now()->subDays(7),
                'category' => $c1,
                'tags' => [$t1->id]
            ],
            [
                'title' => 'Pencegahan Penyakit Umum pada Sapi Perah',
                'excerpt' => 'Langkah preventif untuk menjaga produksi susu tetap stabil.',
                'content' => 'Pencegahan penyakit sapi perah dilakukan dengan manajemen kesehatan yang terpadu, meliputi program vaksinasi yang tepat, penerapan biosekuriti yang ketat (isolasi ternak sakit, kebersihan kandang dan lingkungan), pemberian pakan berkualitas, nutrisi seimbang, suplemen untuk meningkatkan daya tahan tubuh, program obat cacing rutin, serta pemeriksaan kesehatan harian dan rutin oleh dokter hewan. ',
                'author' => 'Drh. Siti',
                'published_at' => Carbon::now()->subDays(3),
                'category' => $c2,
                'tags' => [$t2->id, $t4->id]
            ],
            [
                'title' => 'Pemanfaatan Kotoran Ternak sebagai Pupuk Organik',
                'excerpt' => 'Cara mengolah kotoran ternak menjadi pupuk kompos berkualitas.',
                'content' => 'Pemanfaatan kotoran ternak menjadi pupuk organik melibatkan proses pengomposan atau fermentasi untuk mengubah limbah ini menjadi produk yang kaya nutrisi, memperbaiki struktur tanah, dan mendukung pertanian berkelanjutan. Prosesnya meliputi pencampuran kotoran dengan bahan lain seperti sekam dan pelepah pisang, penambahan dekomposer (seperti EM4 dan larutan gula merah) untuk mempercepat penguraian, dan fermentasi selama beberapa minggu. Hasilnya adalah pupuk organik yang bermanfaat untuk meningkatkan kesuburan tanah dan dapat dijual sebagai peluang ekonomi. ',
                'author' => 'Tim Penyuluh',
                'published_at' => Carbon::now()->subDay(),
                'category' => $c3,
                'tags' => [$t3->id]
            ],
            [
                'title' => 'Checklist Kesehatan Mingguan untuk Kambing Etawa',
                'excerpt' => 'Langkah praktis memeriksa kesehatan kambing untuk menghindari penyakit menular.',
                'content' => 'Checklist kesehatan mingguan kambing etawa meliputi pemberian pakan dan air minum berkualitas setiap hari, pembersihan kandang secara rutin, serta pemeriksaan fisik kambing seperti mata cerah, bulu mengkilap, dan nafsu makan baik. Lakukan juga pemantauan kesehatan setiap hari, terutama pada pagi hari, dan berikan suplemen seperti vitamin serta mineral untuk menjaga kekebalan tubuh dan pertumbuhan yang optimal.',
                'author' => 'Drh. Aditya',
                'published_at' => Carbon::now()->subDays(10),
                'category' => $c2,
                'tags' => [$t2->id]
            ],
            [
                'title' => 'Optimasi Hijauan Segar di Musim Kemarau',
                'excerpt' => 'Teknik menyimpan dan memfermentasi hijauan agar stok pakan tetap aman sepanjang musim.',
                'content' => 'Untuk mengoptimalkan hijauan segar di musim kemarau, peternak dapat melakukan penanaman varietas tanaman pakan yang tahan kekeringan seperti indigofera dan lamtoro, mengawetkan hijauan berlimpah saat musim hujan dengan teknik silase, serta menggunakan manajemen pakan yang efisien seperti pemberian jerami fermentasi dan memanfaatkan limbah pertanian.',
                'author' => 'Admin Nyxx Farm',
                'published_at' => Carbon::now()->subDays(14),
                'category' => $c1,
                'tags' => [$t1->id]
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
