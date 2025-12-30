<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ParkingRecordSeeder extends Seeder {
    public function run(): void {
        $faker = Faker::create('id_ID');
        DB::table('parking_records')->delete();
        $ids = DB::table('kendaraans')->pluck('id')->toArray();
        if(empty($ids)) return;

        foreach ($ids as $kId) {
            for ($i = 0; $i < 3; $i++) {
                $masuk = $faker->dateTimeBetween('-1 month', 'now');
                $keluar = (clone $masuk)->modify('+' . rand(1, 8) . ' hours');
                DB::table('parking_records')->insert(['kendaraan_id' => $kId, 'jam_masuk' => $masuk, 'jam_keluar' => $keluar, 'status' => 'Selesai', 'created_at' => now(), 'updated_at' => now()]);
            }
        }
    }
}