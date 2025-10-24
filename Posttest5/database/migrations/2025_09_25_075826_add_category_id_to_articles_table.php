<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            // nullable karena beberapa artikel mungkin tanpa kategori
            $table->foreignId('category_id')->nullable()->after('slug')->constrained('categories')->nullOnDelete();
        });
    }

    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropConstrainedForeignId('category_id');
        });
    }
};
