<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('story', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('storyimage')->nullable();
            $table->tinyInteger('storyvideotype')->nullable()->comment("0=Internal,1=External");
            $table->string('storyvideo')->nullable();
            $table->tinyInteger('status')->nullable()->comment("0=inactive,1=active,-1=deleted");
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('story');
    }
}
