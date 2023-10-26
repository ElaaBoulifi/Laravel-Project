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
        Schema::create('participatee', function (Blueprint $table) {
            $table->id();
            $table->foreignId("event_id")->constrained()->onDelete("cascade");
            $table->string("nom");
            $table->string("prenom");
            $table->string("email");
            $table->string("tel");
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
        Schema::dropIfExists('participatee');
    }
};
