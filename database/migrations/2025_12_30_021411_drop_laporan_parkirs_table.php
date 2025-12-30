<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('laporan_parkirs');
    }

    public function down(): void
    {
        Schema::create('laporan_parkirs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }
};
