<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvbuildersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cvbuilders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('address')->nullable();
            $table->string('school_name');
            $table->string('school_exam_board');
            $table->string('School_address');
            $table->string('School_end_date');
            $table->string('colleg_name');
            $table->string('college_address');
            $table->string('college_exam_board');
            $table->string('college_end_date');
            $table->string('undergrad_uni_name');
            $table->string('undergrad_uni_address');
            $table->string('undergrad_uni_subject');
            $table->string('undergrad_uni_end_date');
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
        Schema::dropIfExists('cvbuilders');
    }
}
