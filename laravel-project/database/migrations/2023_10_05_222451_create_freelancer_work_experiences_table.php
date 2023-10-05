<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreelancerWorkExperiencesTable extends Migration
{
    public function up()
    {
        Schema::create('freelancer_work_experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('freelancer_resume_id'); // Assuming you have a foreign key to associate the experience with a FreelancerResume
            $table->string('Company_Name');
            $table->string('Title');
            $table->date('Date_From');
            $table->date('Date_To')->nullable();
            $table->text('Description');
            // Add other columns as needed

            $table->timestamps();

            $table->foreign('freelancer_resume_id')->references('id')->on('freelancer_resumes'); // Assuming your resume table is named "freelancer_resumes"
        });
    }

    public function down()
    {
        Schema::dropIfExists('freelancer_work_experiences');
    }
}
