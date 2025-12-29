<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('parking_records', function (Blueprint $table) {

            // admin / satpam yang scan
            $table->foreignId('scanned_by')
                  ->after('kendaraan_id')
                  ->constrained('users')
                  ->onDelete('restrict');

            // snapshot data
            $table->string('plat_snapshot')->after('jam_keluar');
            $table->string('stnk_snapshot')->after('plat_snapshot');

            // status enum
            $table->enum('status', ['ACTIVE', 'DONE'])
                  ->default('ACTIVE')
                  ->change();

            // index
            $table->index(['kendaraan_id', 'jam_masuk']);
        });
    }

    public function down(): void
    {
        Schema::table('parking_records', function (Blueprint $table) {
            $table->dropForeign(['scanned_by']);
            $table->dropColumn(['scanned_by', 'plat_snapshot', 'stnk_snapshot']);
            $table->string('status')->change();
            $table->dropIndex(['kendaraan_id', 'jam_masuk']);
        });
    }
};
