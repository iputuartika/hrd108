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
            // $table->foreignID('jabatan_id')->nullable();
            
            // $table->string('nama')->nullable();
           
            // PERSONAL
            $table->string('avatar')->nullable();
            $table->foreignID('karyawan_id');
            $table->string('ktp')->nullable();
            $table->string('npwp')->nullable();
            $table->string('bpjs')->nullable();
            $table->string('nama')->nullable();
            $table->foreignID('departemen_id')->nullable();
            $table->foreignID('jabatan_id')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('email')->nullable();
            $table->string('kontak')->nullable();
            $table->string('kontak_darurat')->nullable();
            $table->foreignID('kecamatan_id')->nullable();
            $table->foreignID('desa_id')->nullable();
            $table->string('alamat_lengkap')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('status')->nullable();
            $table->string('gol_darah')->nullable();
            $table->string('agama')->nullable();

            // KELUARGA
            $table->string('nama_ibu')->nullable();
            $table->string('jumlah_tanggungan')->nullable();
            $table->string('nama_suami_istri')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('tl_suami_istri')->nullable();
            $table->string('tgl_suami_istri')->nullable();
            $table->string('anak1')->nullable();
            $table->string('tempat_lahir_anak1')->nullable();
            $table->string('tanggal_lahir_anak1')->nullable();
            $table->string('anak2')->nullable();
            $table->string('tempat_lahir_anak2')->nullable();
            $table->string('tanggal_lahir_anak2')->nullable();
            $table->string('anak3')->nullable();
            $table->string('tempat_lahir_anak3')->nullable();
            $table->string('tanggal_lahir_anak3')->nullable();

            // KARIR
            $table->string('status_karyawan')->nullable();
            $table->string('tanggal_bergabung')->nullable();
            $table->string('awal_kontrak')->nullable();
            $table->string('akhir_kontrak')->nullable();
            $table->string('tanggal_keluar')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('status_bpjs')->nullable();

            // GAJI
            $table->string('no_rek')->nullable();
            
            // ADMIN
            $table->string('admin');
            $table->string('unit_usaha');
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
