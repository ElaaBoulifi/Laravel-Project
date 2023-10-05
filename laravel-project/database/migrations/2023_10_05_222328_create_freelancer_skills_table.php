<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreelancerSkillsTable extends Migration
{
    public function up()
    {
        Schema::create('freelancer_skills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('freelancer_resume_id'); // Assuming you have a foreign key to associate the skill with a FreelancerResume
            $table->string('Skill_Name');
            $table->string('proficiency');
            // Add other columns as needed

            $table->timestamps();

            $table->foreign('freelancer_resume_id')->references('id')->on('freelancer_resumes'); // Assuming your resume table is named "freelancer_resumes"
        });
    }

    public function down()
    {
        Schema::dropIfExists('freelancer_skills');
    }
}
