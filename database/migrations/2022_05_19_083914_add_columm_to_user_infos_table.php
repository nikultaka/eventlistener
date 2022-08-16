<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColummToUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_infos', function (Blueprint $table) {
            $table->tinyInteger('accrediate_investor_options')->nullable()->comment("0=inactive,1=active");
            $table->tinyInteger('invest_stock')->nullable()->comment("0=inactive,1=active");
            $table->tinyInteger('answer_all_question')->nullable()->comment("0=inactive,1=active");

            $table->string('mnemonics')->nullable();
            $table->string('wallet_address')->nullable();
            $table->string('private_key')->nullable();
            $table->string('id_card_pic')->nullable();

            $table->string('accreditation_number')->nullable();
            $table->string('ckeck_kyc_link')->nullable();
            $table->tinyInteger('kyc_checked')->nullable()->comment("0=No,1=Yes");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_infos', function (Blueprint $table) {
            //
        });
    }
}
