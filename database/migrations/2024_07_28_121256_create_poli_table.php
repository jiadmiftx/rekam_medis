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
        Schema::create('poli', function (Blueprint $table) {
            $table->id();
            $table->string('kode_poli');
            $table->string('nama');
            $table->string('poli_bpjs')->default(1)->comment('Pasif/Aktif');
            $table->boolean('poli_sakit')->default(1);
            $table->string('kd_tkp')->comment('kodeTKP (10 = RJTP, 20 = RITP, 50 = Promotif)');
            $table->string('kategori')->comment('umum,gigi,bersalin,kia,gizi,psikologi,mtbs');
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
        Schema::dropIfExists('poli');
    }
};
