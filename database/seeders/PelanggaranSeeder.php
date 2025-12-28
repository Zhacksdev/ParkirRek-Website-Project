<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PelanggaranSeeder extends Seeder {
    public function run(): void {
        $faker = Faker::create('id_ID');
        DB::table('pelanggarans')->delete();
        $ids = DB::table('kendaraans')->pluck('id')->toArray();
        if(empty($ids)) return;

        for ($i = 0; $i < 10; $i++) {
            DB::table('pelanggarans')->insert([
                'kendaraan_id' => $faker->randomElement($ids),
                'jenis_pelanggaran' => $faker->randomElement(['Parkir Liar', 'Tidak Bawa STNK']),
                'deskripsi' => 'Melanggar aturan',
                'denda' => $faker->randomElement([50000, 100000]),
                'status' => $faker->randomElement(['Lunas', 'Belum Bayar']),
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }
    }
}