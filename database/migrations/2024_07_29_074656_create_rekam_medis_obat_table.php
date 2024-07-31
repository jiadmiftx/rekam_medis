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
        Schema::create('rekam_medis_obat', function (Blueprint $table) {
            $table->id();
            $table->integer('qty');
            $table->string('resep');
            $table->text('instruksi')->nullable();
            $table->foreignId('rekam_medis_id')
                ->constrained('rekam_medis')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('obat_id')->nullable()
                ->constrained('obat')
                ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_medis_obat');
    }
};
