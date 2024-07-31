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
        Schema::create('rekam_medis_tindakan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('obat_id')->nullable()
                ->constrained('obat')
                ->nullOnDelete();
            $table->foreignId('rekam_medis_id')
                ->constrained('rekam_medis')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_medis_tindakan');
    }
};
