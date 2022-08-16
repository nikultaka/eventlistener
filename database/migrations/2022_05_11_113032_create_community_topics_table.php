<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunityTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community_topics', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('host')->nullable();
            $table->string('text_color')->nullable();
            $table->string('background_color')->nullable();
            $table->tinyInteger('is_verify')->nullable()->comment("0=no,1=yes");
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
        Schema::dropIfExists('community_topics');
    }
}
