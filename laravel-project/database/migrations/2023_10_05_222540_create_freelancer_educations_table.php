<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreelancerEducationsTable extends Migration
{
    public function up()
    {
        Schema::create('freelancer_educations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('freelancer_resume_id'); // Assuming you have a foreign key to associate the education with a FreelancerResume
            $table->string('Degree');
            $table->string('Field_of_Study');
            $table->string('School');
            $table->date('From');
            $table->date('To')->nullable();
            $table->text('Description');
            // Add other columns as needed

            $table->timestamps();

            $table->foreign('freelancer_resume_id')->references('id')->on('freelancer_resumes'); // Assuming your resume table is named "freelancer_resumes"
        });
    }

    public function down()
    {
        Schema::dropIfExists('freelancer_educations');
    }
}
