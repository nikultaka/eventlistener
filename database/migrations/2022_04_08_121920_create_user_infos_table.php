<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->increments('user_info_id');
            $table->integer('user_id')->unsigned();
            $table->string('picture')->nullable();
            $table->string('networth')->nullable();
            $table->string('grossincome')->nullable();
            $table->string('service_utilized')->nullable();
            $table->tinyInteger('is_accredited_investor')->nullable()->comment("0=inactive,1=active");
            $table->tinyInteger('is_experience_in_financial_and_business')->nullable()->comment("0=inactive,1=active");
            $table->tinyInteger('is_accurate_and_complete_answers')->nullable()->comment("0=inactive,1=active");
            $table->tinyInteger('is_seasoned_investor')->nullable()->comment("0=inactive,1=active");
            $table->tinyInteger('status')->nullable()->comment("0=inactive,1=active,-1=deleted");
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
        Schema::dropIfExists('user_infos');
    }
}
