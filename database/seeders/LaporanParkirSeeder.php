<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LaporanParkirSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        DB::table('laporan_parkirs')->delete();

        $userIds = DB::table('users')->where('role', 'user')->pluck('id')->toArray();

        if(empty($userIds)) return;

        for ($i = 0; $i < 15; $i++) {
            DB::table('laporan_parkirs')->insert([
                'mahasiswa_id' => $faker->randomElement($userIds), // <--- UBAH DARI user_id JADI mahasiswa_id
                'lokasi' => 'Gedung ' . $faker->randomElement(['A', 'B', 'C', 'D']),
                'deskripsi' => $faker->sentence(6),
                'foto' => null,
                'status' => $faker->randomElement(['Pending', 'Diproses', 'Selesai']),
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }
    }
}