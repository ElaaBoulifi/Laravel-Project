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
        Schema::create('reclamation', function (Blueprint $table) {
            $table->id(); // Colonne d'ID auto-incrémentée
            $table->string('sujet');
            $table->text('description');
            $table->date('date_soumission');
            $table->string('categorie');
            $table->integer('evaluation');
            $table->string('piece_jointe')->nullable();
            $table->enum('etat', ['en cours de traitement', 'traité'])->default('en cours de traitement');
            $table->timestamps(); // Ajoute automatiquement les colonnes created_at et updated_a
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reclamation');
        Schema::table('reclamation', function (Blueprint $table) {
            $table->dropColumn('etat');
        });

    }
};
