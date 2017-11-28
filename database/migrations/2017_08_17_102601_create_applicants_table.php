<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned()->nullable();
            $table->string('first_name');
            $table->string('middle_initial');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->date('date_of_birth');
            $table->integer('age');
            $table->boolean('gender');
            $table->string('address');
            $table->string('mobile_number');
            $table->string('home_number');
            $table->integer('initial_interview');
            $table->integer('exam_interview');
            $table->integer('final_interview');
            $table->string('description');
            $table->string('job_position');
            $table->integer('expected_salary');
            $table->string('photo_dir')->nullable();
            $table->string('resume_path')->nullable();
            $table->string('type_of_employment');
            $table->string('emergency_person')->nullable();
            $table->string('emergency_person_contact')->nullable();
            $table->string('emergency_person_address')->nullable();
            $table->string('sss')->nullable();
            $table->string('philhealth')->nullable();
            $table->string('health_status')->nullable();
            $table->string('nbi_clearance')->nullable();
            $table->string('tin')->nullable();
            $table->string('pag_ibig')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicants');
    }
}
