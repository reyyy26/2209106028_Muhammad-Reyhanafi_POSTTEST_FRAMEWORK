<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('veterinary_records', function (Blueprint $table) {
            $table->id();

            // Foreign key to animals table
            $table->foreignId('animal_id')->constrained('animals')->onDelete('cascade');

            // Basic information (string types)
            $table->string('veterinarian_name', 100);
            $table->string('treatment_type', 80);

            // Date/DateTime columns (non-string/numeric)
            $table->date('treatment_date');
            $table->time('treatment_time');
            $table->dateTime('next_checkup')->nullable();

            // Boolean columns (non-string/numeric)
            $table->boolean('is_emergency')->default(false);
            $table->boolean('is_completed')->default(true);
            $table->boolean('requires_followup')->default(false);

            // Text column for longer content (non-string)
            $table->text('diagnosis');
            $table->longText('treatment_notes')->nullable();

            // Decimal for precise measurements (numeric but different from integer)
            $table->decimal('cost', 10, 2);
            $table->decimal('weight_at_treatment', 8, 2)->nullable();
            $table->decimal('temperature', 4, 1)->nullable(); // Body temperature

            // JSON column for storing additional metadata (non-string/numeric)
            $table->json('medications')->nullable();
            $table->json('lab_results')->nullable();

            // Enum-like column using string with check constraint
            $table->enum('severity', ['low', 'medium', 'high', 'critical'])->default('medium');
            $table->enum('status', ['scheduled', 'in_progress', 'completed', 'cancelled'])->default('completed');

            // Binary/blob for storing files (non-string/numeric)
            $table->binary('medical_images')->nullable();

            // Additional useful columns
            $table->integer('age_at_treatment')->unsigned()->nullable();
            $table->year('treatment_year');

            $table->timestamps();

            // Indexes for performance
            $table->index(['animal_id', 'treatment_date']);
            $table->index(['treatment_date', 'veterinarian_name']);
            $table->index(['is_emergency', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veterinary_records');
    }
};