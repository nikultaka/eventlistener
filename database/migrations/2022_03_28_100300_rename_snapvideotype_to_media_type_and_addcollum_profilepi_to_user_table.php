<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameSnapvideotypeToMediaTypeAndAddcollumProfilepiToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('snaps', function (Blueprint $table) {
            $table->renameColumn('storyvideotype', 'mediatype');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile_pic')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('snaps', function (Blueprint $table) {
           //
        });
        Schema::table('users', function (Blueprint $table) {
          //
        });
    }
}
