<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->string('no_rekam_medis');
            $table->string('nik')->nullable();
            $table->string('no_kk')->nullable();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir');
            $table->date('ttl')->comment('tempat tanggal lahir');
            $table->string('gol_darah')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('provinsi');
            $table->string('kecamatan');
            $table->string('desa')->comment('kelurahan');
            $table->string('alamat');
            $table->string('agama');
            $table->string('pendidikan_terkahir');
            $table->string('profesi');
            $table->string('intansi')->nullable();
            $table->string('departemen')->nullable();
            $table->string('bpjs_no')->nullable();
            $table->date('bpjs_tgl_akhir_berlaku')->nullable();
            $table->date('bpjs_tgl_akhir_sync')->nullable();
            $table->json('bpjs')->nullable();
            $table->text('bpjs_note_sync')->nullable();
            $table->boolean('wni')->default(1);
            $table->boolean('bpjs_aktif')->default(false);
            $table->bigInteger('created_by');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien');
    }
};
