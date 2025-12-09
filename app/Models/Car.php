<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'features' => 'array',
    ];

    protected $fillable = [
        'brand',
        'model',
        'year',
        'price',
        'mileage',
        'transmission',
        'status',
        'image',
        'location',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(CarImage::class);
    }
} // <--- Tanda } penutup HANYA boleh ada di baris paling akhir ini