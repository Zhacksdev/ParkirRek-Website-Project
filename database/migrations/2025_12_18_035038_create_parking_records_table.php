<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('parking_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kendaraan_id')
                ->constrained('kendaraans')
                ->onDelete('cascade');
            $table->dateTime('jam_masuk');
            $table->dateTime('jam_keluar')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parking_records');
    }
};
