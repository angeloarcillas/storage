<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('owner_id')->unsigned();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_date');
            $table->string('gender');
            $table->string('email')->unique();
            $table->bigInteger('contact');
            $table->string('employment');
            $table->string('guardian_name');
            $table->string('guardian_contact');
            $table->string('scholar_type');
            $table->string('class_course');
            $table->string('class_subject');
            $table->string('class_time');
            $table->timestamps();
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scholar');
    }
}
