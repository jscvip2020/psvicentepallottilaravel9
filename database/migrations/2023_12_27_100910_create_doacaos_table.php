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
        Schema::create('doacaos', function (Blueprint $table) {
            $table->id();
            $table->string('imgtopo')->nullable();
            $table->string('qrcode')->nullable();
            $table->string('banco')->nullable();
            $table->string('conta')->nullable();
            $table->string('agencia')->nullable();
            $table->string('cnpj')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doacaos');
    }
};
