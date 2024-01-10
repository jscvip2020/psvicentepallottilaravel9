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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->enum('dia',['SEG','TER','QUA','QUI','SEX','SAB','DOM']);
            $table->time('inicio1')->nullable();
            $table->time('final1')->nullable();
            $table->time('inicio2')->nullable();
            $table->time('final2')->nullable();
            $table->text('descricao')->nullable();
            $table->foreignId('tipoatendimento_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
