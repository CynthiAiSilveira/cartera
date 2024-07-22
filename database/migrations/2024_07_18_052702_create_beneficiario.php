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
        Schema::create('Beneficiarios', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id_beneficiario'); 
            $table->unsignedBigInteger('id_tipo');
            $table->string('nombre', 255)->notNullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Beneficiarios');
    }
};
