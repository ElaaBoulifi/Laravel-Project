<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreelancerResumesTable extends Migration
{
    public function up()
    {
        Schema::create('freelancer_resumes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Assuming you have a user_id to associate the resume with a user
            $table->string('Name');
            $table->string('Email');
            $table->string('Profession_Title');
            $table->string('Location');
            $table->string('Web');
            $table->decimal('Pre_Hour', 8, 2);
            $table->integer('Age');
            // Add other columns as needed

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users'); // Assuming you have a users table
        });
    }

    public function down()
    {
        Schema::dropIfExists('freelancer_resumes');
    }
}
