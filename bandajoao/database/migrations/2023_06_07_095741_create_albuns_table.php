<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

    /**
     * Run the migrations.
     */
    class CreateAlbunsTable extends Migration
    {
        public function up()
        {
            Schema::create('albuns', function (Blueprint $table) {
                $table->id();
                $table->string('nome');
                $table->string('imagem')->nullable();
                $table->date('data_lancamento');
                $table->unsignedBigInteger('banda_id');
                $table->timestamps();

                $table->foreign('banda_id')->references('id')->on('bandas')->onDelete('cascade');
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albuns');
    }
};
