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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->string('no_pendaftaran');
            $table->bigInteger('pasien_id')->comment('Pasien');
            $table->date('tgl_daftar');
            $table->boolean('kunj_sakit')->default(true)->comment('Atribute BPJS');
            $table->integer('poli_id');
            $table->integer('no_antrian');
            $table->string('jenis_pendaftaran');
            $table->string('rujukan_dari');
            $table->string('status')->nullable()->comment('status antrian');
            $table->boolean('telah_dilayani')->default(0);
            $table->bigInteger('kamar_rawat_inap_id')->nullable();
            $table->bigInteger('created_by');
            $table->text('bpjs_note_sync')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};
