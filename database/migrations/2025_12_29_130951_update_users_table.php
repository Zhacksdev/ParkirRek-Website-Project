<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            // ubah role dari string ke enum
            $table->enum('role', ['admin', 'student'])
                  ->default('student')
                  ->change();

            // tambah area (khusus admin)
            $table->string('area')->nullable();

            // remember token
            $table->rememberToken();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->change();
            $table->dropColumn(['area', 'remember_token']);
        });
    }
};
