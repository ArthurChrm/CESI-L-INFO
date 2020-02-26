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
            $table->bigInteger('id_recipient');
            $table->text('content');
            $table->timestamps();

            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_salon');

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_salon')->references('id')->on('salons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages',function(Blueprint $table){
            $table->dropForeign('id_user');
            $table->dropForeign('id_salon');
        });
        Schema::dropIfExists('messages');
    }
}
