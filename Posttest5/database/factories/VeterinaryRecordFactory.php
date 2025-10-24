<?php

namespace Database\Factories;

use App\Models\Animal;
use App\Models\VeterinaryRecord;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<VeterinaryRecord>
 */
class VeterinaryRecordFactory extends Factory
{
    protected $model = VeterinaryRecord::class;

    public function definition(): array
    {
        $treatmentDate = $this->faker->dateTimeBetween('-90 days', 'now');
        $nextCheckup = $this->faker->dateTimeBetween($treatmentDate, '+90 days');
        $severity = $this->faker->randomElement(['low', 'medium', 'high', 'critical']);
        $status = $this->faker->randomElement(['scheduled', 'in_progress', 'completed']);
        $medicationPool = [
            'Vitamin B Kompleks 5ml',
            'Antibiotik Amoxicillin 500mg',
            'Pakan tambahan mineral',
            'Vaksin kombinasi IBR-BVD',
            'Suplemen elektrolit',
            'Anti-inflamasi Meloxicam',
        ];

        return [
            'animal_id' => Animal::factory(),
            'veterinarian_name' => $this->faker->name(),
            'treatment_type' => $this->faker->randomElement([
                'Pemeriksaan Rutin',
                'Vaksinasi Tahunan',
                'Perawatan Luka',
                'Operasi Minor',
                'Terapi Nutrisi',
            ]),
            'treatment_date' => $treatmentDate->format('Y-m-d'),
            'treatment_time' => $treatmentDate->format('H:i:s'),
            'next_checkup' => $nextCheckup,
            'is_emergency' => $severity === 'critical' ? true : $this->faker->boolean(20),
            'is_completed' => $status === 'completed',
            'requires_followup' => $status !== 'completed' ? true : $this->faker->boolean(40),
            'diagnosis' => $this->faker->paragraph(),
            'treatment_notes' => $this->faker->paragraph(3),
            'cost' => $this->faker->numberBetween(50000, 900000),
            'weight_at_treatment' => $this->faker->randomFloat(2, 2, 650),
            'temperature' => $this->faker->randomFloat(1, 36.5, 41.5),
            'medications' => $this->faker->randomElements($medicationPool, $this->faker->numberBetween(1, 3)),
            'lab_results' => [
                'blood_count' => $this->faker->numberBetween(7000, 13000) . '/µL',
                'protein_level' => $this->faker->randomFloat(1, 6.5, 8.5) . ' g/dL',
            ],
            'severity' => $severity,
            'status' => $status,
            'age_at_treatment' => $this->faker->numberBetween(1, 10),
            'treatment_year' => (int) $treatmentDate->format('Y'),
        ];
    }
}
