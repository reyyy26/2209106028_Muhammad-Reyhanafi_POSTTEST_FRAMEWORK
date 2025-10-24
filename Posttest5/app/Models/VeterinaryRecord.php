<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VeterinaryRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'animal_id',
        'veterinarian_name',
        'treatment_type',
        'treatment_date',
        'treatment_time',
        'next_checkup',
        'is_emergency',
        'is_completed',
        'requires_followup',
        'diagnosis',
        'treatment_notes',
        'cost',
        'weight_at_treatment',
        'temperature',
        'medications',
        'lab_results',
        'severity',
        'status',
        'medical_images',
        'age_at_treatment',
        'treatment_year',
    ];

    protected $casts = [
        'treatment_date' => 'date',
        'treatment_time' => 'datetime:H:i',
        'next_checkup' => 'datetime',
        'is_emergency' => 'boolean',
        'is_completed' => 'boolean',
        'requires_followup' => 'boolean',
        'cost' => 'decimal:2',
        'weight_at_treatment' => 'decimal:2',
        'temperature' => 'decimal:1',
        'medications' => 'array',
        'lab_results' => 'array',
        'age_at_treatment' => 'integer',
        'treatment_year' => 'integer',
    ];

    /**
     * Get the animal that owns the veterinary record.
     */
    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class);
    }

    /**
     * Scope for emergency records
     */
    public function scopeEmergency($query)
    {
        return $query->where('is_emergency', true);
    }

    /**
     * Scope for records by severity
     */
    public function scopeBySeverity($query, $severity)
    {
        return $query->where('severity', $severity);
    }

    /**
     * Scope for records by status
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Get formatted cost
     */
    public function getFormattedCostAttribute()
    {
        return 'Rp '.number_format($this->cost, 0, ',', '.');
    }

    /**
     * Get severity badge color
     */
    public function getSeverityColorAttribute()
    {
        return match ($this->severity) {
            'low' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200',
            'medium' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200',
            'high' => 'bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200',
            'critical' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200',
            default => 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200',
        };
    }

    /**
     * Get status badge color
     */
    public function getStatusColorAttribute()
    {
        return match ($this->status) {
            'scheduled' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200',
            'in_progress' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200',
            'completed' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200',
            'cancelled' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200',
            default => 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200',
        };
    }
}