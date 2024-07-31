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
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id();
            $table->text('keluhan');
            $table->string('kd_kunjungan');
            $table->longText('alergi')->nullable();
            $table->string('kd_sadar'); //>comment('01 = Compose Mentis, 02 = Somnolence, 03 = Sopor, 04 = coma');
            $table->integer('sistole')->default(0);
            $table->integer('diastole')->default(0);
            $table->float('berat_badan')->default(0);
            $table->integer('tinggi_badan')->default(0);
            $table->integer('heart_rate')->default(0);
            $table->dateTime('tgl_kembali_berkunjung')->nullable();
            $table->text('follow_up')->nullable();
            $table->string('jenis_pelayanan')->nullable();
            $table->bigInteger('dokter_id')->nullable();
            $table->bigInteger('perawat_id')->nullable();
            $table->bigInteger('pasien_id')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->foreignId('pendaftaran_id')
                ->constrained('pendaftaran')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_medis');
    }
};
