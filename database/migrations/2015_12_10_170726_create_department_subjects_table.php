<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id')->unsigned();
            $table->integer('subject_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->string('group', 1)->default('A');
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
        Schema::drop('department_subjects');
    }
}
