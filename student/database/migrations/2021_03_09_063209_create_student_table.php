<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('firstname',45)->nullable();
            $table->string('lastname',45)->nullable();
            $table->string('regno',10)->nullable();
            $table->integer('age')->unsigned()->nullable();
            $table->string('gender',45)->nullable();
            $table->string('department',45)->nullable();
            $table->string('email',45)->nullable()->unique();
            $table->string('phono',15)->nullable();
            $table->string('address',255)->nullable();
            $table->string('image',45)->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student');
    }
}
