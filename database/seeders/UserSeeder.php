<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder {
    public function run(): void {
        $faker = Faker::create('id_ID');
        // Hapus data lama
        DB::table('users')->delete();

        // 1. Admin & User Tetap
        DB::table('users')->insert([
            ['nama' => 'Super Admin', 'email' => 'admin@parkir.com', 'password' => Hash::make('password'), 'role' => 'admin', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Mahasiswa Demo', 'email' => 'user@parkir.com', 'password' => Hash::make('password'), 'role' => 'user', 'created_at' => now(), 'updated_at' => now()]
        ]);

        // 2. Dummy Users
        for ($i = 0; $i < 20; $i++) {
            DB::table('users')->insert([
                'nama' => $faker->name,
                'email' => $faker->unique()->userName . '@student.telkom.ac.id',
                'password' => Hash::make('password'),
                'role' => 'user',
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }
    }
}