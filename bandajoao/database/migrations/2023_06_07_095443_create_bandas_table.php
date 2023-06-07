<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

    /**
     * Run the migrations.
     */

     class CreateBandasTable extends Migration
     {
         public function up()
         {
             Schema::create('bandas', function (Blueprint $table) {
                 $table->id();
                 $table->string('nome');
                 $table->string('foto')->nullable();
                 $table->integer('num_albuns');
                 $table->timestamps();
             });
         }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bandas');
    }
};
