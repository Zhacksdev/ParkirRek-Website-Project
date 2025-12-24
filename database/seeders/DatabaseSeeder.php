<?php

namespace Database\Seeders;

// Hapus use App\Models\User; karena kita pakai seeder manual
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil seeder urut dari induk ke anak (PENTING URUTANNYA)
        $this->call([
            UserSeeder::class,          // 1. Buat User & Admin
            AdminSeeder::class,         // 2. Masukkan ke tabel Admin
            KendaraanSeeder::class,     // 3. Beri kendaraan ke User
            ParkingRecordSeeder::class, // 4. Buat history parkir
            LaporanParkirSeeder::class, // 5. Buat laporan
            PelanggaranSeeder::class,   // 6. Buat data pelanggaran
        ]);
    }
}