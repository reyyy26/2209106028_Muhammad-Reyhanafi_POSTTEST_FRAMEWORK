<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VeterinaryRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get some animals to reference (or create them if they don't exist)
        $animals = \App\Models\Animal::take(5)->get();

        if ($animals->count() < 5) {
            // If we don't have enough animals, create some sample ones
            $animalData = [
                ['name' => 'Bella', 'species' => 'Sapi', 'breed' => 'Holstein', 'age' => 3, 'description' => 'Sapi perah produktif'],
                ['name' => 'Charlie', 'species' => 'Kambing', 'breed' => 'Etawa', 'age' => 2, 'description' => 'Kambing perah unggul'],
                ['name' => 'Luna', 'species' => 'Domba', 'breed' => 'Merino', 'age' => 1, 'description' => 'Domba penghasil wol'],
                ['name' => 'Max', 'species' => 'Ayam', 'breed' => 'Leghorn', 'age' => 1, 'description' => 'Ayam petelur'],
                ['name' => 'Rocky', 'species' => 'Kuda', 'breed' => 'Arabian', 'age' => 5, 'description' => 'Kuda kerja'],
            ];

            foreach ($animalData as $data) {
                \App\Models\Animal::firstOrCreate(['name' => $data['name']], $data);
            }

            $animals = \App\Models\Animal::take(5)->get();
        }

        // Create veterinary records
        $records = [
            [
                'animal_id' => $animals[0]->id,
                'veterinarian_name' => 'Dr. Susanto Wijaya',
                'treatment_type' => 'Vaksinasi Rutin',
                'treatment_date' => now()->subDays(30),
                'treatment_time' => '09:30:00',
                'next_checkup' => now()->addMonths(6),
                'is_emergency' => false,
                'is_completed' => true,
                'requires_followup' => true,
                'diagnosis' => 'Hewan dalam kondisi sehat, perlu vaksinasi booster untuk pencegahan penyakit.',
                'treatment_notes' => 'Vaksinasi IBR, BVD, dan PI3 berhasil diberikan. Hewan menunjukkan respons positif tanpa efek samping. Rekomendasi: pantau kondisi selama 48 jam dan berikan vitamin tambahan.',
                'cost' => 250000.00,
                'weight_at_treatment' => 450.50,
                'temperature' => 38.5,
                'medications' => ['Vaksin IBR-BVD 2ml', 'Vitamin B Complex 5ml'],
                'lab_results' => ['blood_count' => 'Normal', 'protein_level' => '7.2 g/dL'],
                'severity' => 'low',
                'status' => 'completed',
                'age_at_treatment' => 3,
                'treatment_year' => now()->year,
            ],
            [
                'animal_id' => $animals[1]->id,
                'veterinarian_name' => 'Dr. Ratna Sari',
                'treatment_type' => 'Perawatan Luka',
                'treatment_date' => now()->subDays(15),
                'treatment_time' => '14:15:00',
                'next_checkup' => now()->addWeeks(2),
                'is_emergency' => true,
                'is_completed' => true,
                'requires_followup' => true,
                'diagnosis' => 'Luka sayat pada kaki depan akibat kawat berduri. Infeksi ringan terdeteksi.',
                'treatment_notes' => 'Pembersihan luka dengan antiseptik, pemberian antibiotik topikal dan sistemik. Luka dijahit dengan 6 jahitan.',
                'cost' => 175000.00,
                'weight_at_treatment' => 35.75,
                'temperature' => 39.2,
                'medications' => ['Amoxicillin 500mg', 'Betadine topikal'],
                'lab_results' => ['white_blood_cells' => '12,000/μL', 'infection' => 'Elevated'],
                'severity' => 'medium',
                'status' => 'completed',
                'age_at_treatment' => 2,
                'treatment_year' => now()->year,
            ],
            [
                'animal_id' => $animals[2]->id,
                'veterinarian_name' => 'Dr. Bambang Hartono',
                'treatment_type' => 'Operasi Caesarean',
                'treatment_date' => now()->subDays(7),
                'treatment_time' => '07:00:00',
                'next_checkup' => now()->addDays(10),
                'is_emergency' => true,
                'is_completed' => true,
                'requires_followup' => true,
                'diagnosis' => 'Distosia (kesulitan melahirkan) karena posisi anak yang tidak normal.',
                'treatment_notes' => 'Operasi caesarean darurat berhasil dilakukan. Melahirkan 2 anak domba sehat. Recovery berjalan baik.',
                'cost' => 800000.00,
                'weight_at_treatment' => 55.20,
                'temperature' => 39.8,
                'medications' => ['Ketamine anestesi', 'Ceftiofur antibiotik', 'Meloxicam anti-inflamasi'],
                'lab_results' => ['surgery_status' => 'Success', 'offspring_count' => 2],
                'severity' => 'critical',
                'status' => 'completed',
                'age_at_treatment' => 1,
                'treatment_year' => now()->year,
            ],
            [
                'animal_id' => $animals[3]->id,
                'veterinarian_name' => 'Dr. Maya Kusuma',
                'treatment_type' => 'Pemeriksaan Rutin',
                'treatment_date' => now()->subDays(3),
                'treatment_time' => '11:45:00',
                'next_checkup' => now()->addMonths(3),
                'is_emergency' => false,
                'is_completed' => true,
                'requires_followup' => false,
                'diagnosis' => 'Kondisi kesehatan baik, produktivitas telur optimal.',
                'treatment_notes' => 'Pemeriksaan fisik lengkap, semua dalam kondisi normal. Produksi telur stabil 5-6 butir per minggu.',
                'cost' => 50000.00,
                'weight_at_treatment' => 2.30,
                'temperature' => 41.0,
                'medications' => ['Multivitamin', 'Calcium supplement'],
                'lab_results' => ['egg_production' => '85%', 'parasite_check' => 'Negative'],
                'severity' => 'low',
                'status' => 'completed',
                'age_at_treatment' => 1,
                'treatment_year' => now()->year,
            ],
            [
                'animal_id' => $animals[4]->id,
                'veterinarian_name' => 'Dr. Agus Priyanto',
                'treatment_type' => 'Perawatan Kuku',
                'treatment_date' => now()->subDays(1),
                'treatment_time' => '16:20:00',
                'next_checkup' => now()->addMonths(4),
                'is_emergency' => false,
                'is_completed' => true,
                'requires_followup' => false,
                'diagnosis' => 'Kuku tumbuh berlebihan dan perlu dipotong untuk mencegah masalah mobilitas.',
                'treatment_notes' => 'Pemotongan kuku pada keempat kaki. Pembersihan dan aplikasi antiseptik.',
                'cost' => 125000.00,
                'weight_at_treatment' => 520.00,
                'temperature' => 37.8,
                'medications' => ['Iodine solution', 'Copper sulfate foot bath'],
                'lab_results' => ['hoof_condition' => 'Good', 'mobility' => 'Improved'],
                'severity' => 'low',
                'status' => 'completed',
                'age_at_treatment' => 5,
                'treatment_year' => now()->year,
            ],
        ];

        foreach ($records as $record) {
            \App\Models\VeterinaryRecord::create($record);
        }
    }
}