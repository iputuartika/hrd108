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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('karyawan_id')->nullable();
            $table->foreignID('departemen_id')->nullable();
            $table->foreignID('kecamatan_id')->nullable();
            $table->foreignID('desa_id')->nullable();
            $table->foreignID('jabatan_id')->nullable();
            $table->string('ktp')->nullable();
            $table->string('npwp')->nullable();
            $table->string('nama')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('kontak')->nullable();
            $table->string('email')->nullable();
            $table->string('alamat_lengkap')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('status')->nullable();
            $table->string('gol_darah')->nullable();
            $table->string('agama')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
