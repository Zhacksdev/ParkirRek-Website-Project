<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KendaraanSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        DB::table('kendaraans')->delete();

        $users = DB::table('users')->where('role', 'user')->get();

        foreach ($users as $user) {
            $jumlahKendaraan = rand(1, 2);

            for ($k = 0; $k < $jumlahKendaraan; $k++) {
                DB::table('kendaraans')->insert([
                    'mahasiswa_id' => $user->id, // <--- UBAH DARI user_id JADI mahasiswa_id
                    'jenis_kendaraan' => $faker->randomElement(['Motor', 'Mobil']),
                    'plat_no' => strtoupper($faker->bothify('? #### ??')),
                    'jam_masuk' => null,
                    'jam_keluar' => null,
                    'created_at' => now(), 'updated_at' => now(),
                ]);
            }
        }
    }
}