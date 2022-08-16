<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndustriesInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('industries_info', function (Blueprint $table){
            $table->increments('industries_info_id');
            $table->integer('industries_id');
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('title')->nullable();
            $table->string('city')->nullable();
            $table->string('sector')->nullable();
            $table->string('cto')->nullable();
            $table->text('problemsolveing')->nullable();
            $table->text('competitive_advantage')->nullable();
            $table->text('traction')->nullable();
            $table->text('description')->nullable();
            $table->date('founddate')->nullable();
            $table->integer('annual_revenue')->nullable();
            $table->integer('revenue')->nullable();
            $table->tinyInteger('mvp')->nullable()->comment("0=inactive,1=active");
            $table->string('socialmedia')->nullable();
            $table->tinyInteger('status')->nullable()->comment("0=inactive,1=active,-1=deleted");
            $table->timestamps();                        
        });      

        // Schema::table('industries_info', function (Blueprint $table){
        //     $table->foreign('industries_id')->references('id')->on('tbl_industries')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('industries_info');
    }
}
