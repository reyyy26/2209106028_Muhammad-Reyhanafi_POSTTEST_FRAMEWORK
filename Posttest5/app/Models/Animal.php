<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'species',
        'breed',
        'age',
        'description',
        'image_url',
    ];

    public function veterinaryRecords(): HasMany
    {
        return $this->hasMany(VeterinaryRecord::class);
    }
}
