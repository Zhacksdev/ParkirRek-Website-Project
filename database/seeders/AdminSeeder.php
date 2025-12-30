<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder {
    public function run(): void {
        DB::table('admins')->delete();
        $adminUsers = DB::table('users')->where('role', 'admin')->get();
        foreach ($adminUsers as $admin) {
            DB::table('admins')->insert(['user_id' => $admin->id, 'area' => 'Pos Utama', 'created_at' => now(), 'updated_at' => now()]);
        }
    }
}