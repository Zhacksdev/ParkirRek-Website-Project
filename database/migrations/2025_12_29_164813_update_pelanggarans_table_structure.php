<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pelanggarans', function (Blueprint $table) {

            // admin / satpam pembuat pelanggaran
            $table->foreignId('created_by')
                  ->after('id')
                  ->constrained('users')
                  ->onDelete('restrict');

            // plat nomor wajib
            $table->string('plat_no')->after('kendaraan_id');

            // foto bukti
            $table->string('photo_path')->after('deskripsi');

            // status enum
            $table->enum('status', ['OPEN', 'RESOLVED'])
                  ->default('OPEN')
                  ->change();

            // index
            $table->index(['plat_no', 'status']);
        });
    }

    public function down(): void
    {
        Schema::table('pelanggarans', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropColumn(['created_by', 'plat_no', 'photo_path']);
            $table->string('status')->change();
            $table->dropIndex(['plat_no', 'status']);
        });
    }
};
