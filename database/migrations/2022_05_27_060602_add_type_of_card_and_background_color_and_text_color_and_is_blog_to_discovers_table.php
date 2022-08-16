<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeOfCardAndBackgroundColorAndTextColorAndIsBlogToDiscoversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('discovers', function (Blueprint $table) {
            $table->string('text_color')->nullable();
            $table->string('background_color')->nullable();
            $table->tinyInteger('is_blog')->nullable()->comment("0=no,1=yes");
            $table->tinyInteger('type_of_card')->nullable()->comment("0=inactive,1=active");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('discovers', function (Blueprint $table) {
            //
        });
    }
}
