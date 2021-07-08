<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCVDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_c_v_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->date('dob');
            $table->string('phone');
            $table->string('address')->nullable();
            $table->string('school_name');
            $table->string('school_exam_board');
            $table->string('School_address');
            $table->string('School_end_date');
            $table->string('colleg_name')->nullable();
            $table->string('college_address')->nullable();
            $table->string('college_exam_board')->nullable();
            $table->string('college_end_date')->nullable();
            $table->string('undergrad_uni_name')->nullable();
            $table->string('undergrad_uni_address')->nullable();
            $table->string('undergrad_uni_subject')->nullable();
            $table->string('undergrad_uni_end_date')->nullable();
            $table->string('postgrad_uni_name')->nullable();
            $table->string('postgrad_uni_address')->nullable();
            $table->string('postgrad_uni_subject')->nullable();
            $table->string('postgrad_uni_end_date')->nullable();
            $table->string('experience_one');
            $table->string('job_description_one');
            $table->string('duration_one');
            $table->string('experience_two')->nullable();
            $table->string('job_description_two')->nullable();
            $table->string('duration_two')->nullable();
            $table->string('experience_three')->nullable();
            $table->string('job_description_three')->nullable();
            $table->string('duration_three')->nullable();
            $table->string('Keyskills');
            $table->string('language');
            $table->string('language_two')->nullable();
            $table->string('refrence_one');
            $table->string('refrence_position');
            $table->string('refrence_organization');
            $table->string('refrence_person_email');
            $table->string('refrence_phonenumber')->nullable();
            $table->string('refrence_tow')->nullable();
            $table->string('refrence_position_two')->nullable();
            $table->string('refrence_organization_two')->nullable();
            $table->string('refrence_person_email_two')->nullable();
            $table->string('refrence_phonenumber_two')->nullable();
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
        Schema::dropIfExists('user_c_v_details');
    }
}
