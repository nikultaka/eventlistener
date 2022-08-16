<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToTopicPostAndtable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('topic_post', function (Blueprint $table) {
            $table->integer('user_id')->nullable();
        });

        Schema::table('topic_comment', function (Blueprint $table) {
            $table->integer('user_id')->nullable();
        });

        Schema::table('topic_suggestion', function (Blueprint $table) {
            $table->integer('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('topic_post', function (Blueprint $table) {
            //
        });
    }
}
