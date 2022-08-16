<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('parent_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('community_category_id')->nullable();
            $table->string('message_type')->nullable();
            $table->string('message_text')->nullable();
            $table->tinyInteger('is_read')->nullable()->comment("0=no,1=yes");
            $table->tinyInteger('is_verified')->nullable()->comment("0=no,1=yes");
            $table->tinyInteger('is_follow')->nullable()->comment("0=no,1=yes");
            $table->tinyInteger('status')->nullable()->comment("0=inactive,1=active,-1=deleted");
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });

        Schema::rename('community_category', 'community_categorys');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
