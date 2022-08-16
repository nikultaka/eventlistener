<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback_subject', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('feedback_subject_name')->nullable();
            $table->tinyInteger('status')->nullable()->default('1')->comment("0=inactive,1=active,-1=deleted");
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
        Schema::dropIfExists('feedback_subject');
    }
}
