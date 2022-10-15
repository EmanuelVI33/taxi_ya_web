<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conductors', function (Blueprint $table) {
            $table->id();

            // $table->unsignedBigInteger('user_id');
            $table->foreignId('cliente_id', 'id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');
            $table->string('ci');
            $table->boolean('ocupado');


            $table->string('fotoAntecedente');
            $table->string('fotoLicencia');
            $table->string('fotoTIC');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conductors');
    }
};
