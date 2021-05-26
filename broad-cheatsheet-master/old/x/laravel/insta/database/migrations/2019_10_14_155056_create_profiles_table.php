<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('user_id');
          $table->string('profile_img')->nullable();
          $table->string('title')->nullable();
          $table->text('description')->nullable();
          $table->string('url')->nullable();
          $table->integer('following_count')->default(0);
          $table->integer('followers_count')->default(0);
          $table->timestamps();

          $table->index('user_id');
          $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
