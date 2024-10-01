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
        Schema::create('catatan', function (Blueprint $table) {
            $table->id();
                $table->string('nik', 50)->unique();
                $table->date('tanggal');
                $table->time(' waktu');
                $table->string('lokasi',50);
                $table->string('suhu', 20);
                $table->string('catatan',500);
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
