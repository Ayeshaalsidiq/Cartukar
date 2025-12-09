<?php

namespace Database\Seeders;

use App\Models\Car; // Gunakan Model agar casting JSON otomatis jalan
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        // Data 1: Fortuner
        Car::create([
            'brand' => 'Toyota',
            'model' => 'Fortuner VRZ 2.4',
            'year' => 2022,
            'transmission' => 'Otomatis',
            'mileage' => 24000,
            'location' => 'Jakarta Selatan',
            'price' => 485000000,
            'image' => 'https://images.unsplash.com/photo-1603584173870-7f23fdae1b7a?auto=format&fit=crop&w=800&q=80',
            'badge' => 'Hot Deal',
            'description' => 'Mobil tangan pertama, service record Auto2000 lengkap. Bebas banjir dan tabrakan.',
            'features' => [
                'Power Back Door',
                'Wireless Charging',
                '7 Airbags',
                'Blind Spot Monitor',
                'Hill Start Assist',
                'Leather Seats'
            ]
        ]);

        // Data 2: Pajero
        Car::create([
            'brand' => 'Mitsubishi',
            'model' => 'Pajero Sport Dakar',
            'year' => 2021,
            'transmission' => 'Otomatis',
            'mileage' => 18000,
            'location' => 'Bandung',
            'price' => 460000000,
            'image' => 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&w=800&q=80',
            'badge' => 'Low KM',
            'description' => 'Kondisi istimewa, pajak panjang, ban tebal, siap pakai luar kota.',
            // DATA REAL FITUR
            'features' => [
                'Sunroof',
                'Electric Parking Brake',
                '8 Speed AT',
                'Rear Camera',
                'Cruise Control',
                'Paddle Shift'
            ]
        ]);

        // Data 3: CRV
        Car::create([
            'brand' => 'Honda',
            'model' => 'CR-V 1.5 Turbo Prestige',
            'year' => 2020,
            'transmission' => 'Otomatis',
            'mileage' => 35000,
            'location' => 'Jakarta Barat',
            'price' => 415000000,
            'image' => 'https://images.unsplash.com/photo-1568844293986-8d04aa2a8cd4?auto=format&fit=crop&w=800&q=80',
            'badge' => 'Baru Masuk',
            'description' => 'Tipe tertinggi Prestige. Ada Honda Sensing. Sangat nyaman.',
            // DATA REAL FITUR
            'features' => [
                'Panoramic Sunroof',
                'Honda Sensing',
                'Power Tailgate',
                'Remote Engine Start',
                '6 Airbags',
                'Lane Watch'
            ]
        ]);
    }
}
