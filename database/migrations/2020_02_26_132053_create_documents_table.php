<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('link');
            $table->timestamps();

            $table->unsignedBigInteger('id_message');
            $table->foreign('id_message')->references('id')->on('messages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents',function (Blueprint $table){
            $table->dropForeign('id_message');
        });
        Schema::dropIfExists('documents');
    }
}
