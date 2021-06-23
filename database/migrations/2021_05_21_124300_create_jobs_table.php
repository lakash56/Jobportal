 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('company_id')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('description')->nullable();
            $table->text('roles')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('position')->nullable();
            $table->string('address')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable();
            $table->date('last_date')->nullable();
            $table->integer('number_of_vacancy')->nullable();
            $table->integer('experience_year')->nullable();
            $table->string('gender')->nullable();
            $table->string('salary')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
