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
        Schema::create('cheques', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id_cheque');
            $table->date('fecha_creacion')->notNullable();
            $table->decimal('cantidad', 20, 2)->notNullable();
            $table->unsignedBigInteger('id_beneficiario');
            $table->string('cantidad_letra', 255)->notNullable();
            $table->timestamps();

            
        
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cheques');
    }
};

