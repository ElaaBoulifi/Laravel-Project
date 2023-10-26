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
        Schema::create('inscription', function (Blueprint $table) {
            $table->id();
        $table->unsignedBigInteger('id_formation');
        $table->string("nom");
        $table->string("prenom");
        $table->string("email");
        $table->string("etat")->default("en_cours");
        $table->timestamp("date_inscription")->default(now());
        $table->timestamps(false);

        $table->foreign('id_formation')->references('id')->on('formation')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
