<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            // TODO: Check this values after programming
            $table->text('image')->nullable();
            $table->text('audio')->nullable();
            // /TODO
            $table->date('released_at')->nullable();
            $table->string('record')->nullable();
            $table->string('p-line')->nullable();
            $table->string('c-line')->nullable();
            $table->text('description')->nullable();
            $table->integer('plays')->default(0);
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')
              ->onDelete('cascade');
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
        Schema::dropIfExists('songs');
    }
}
