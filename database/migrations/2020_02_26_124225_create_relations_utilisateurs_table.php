<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationsUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relations_utilisateurs', function (Blueprint $table) {
            $table->bigInteger('id_promotion');
            $table->bigInteger('id_user');
            $table->timestamps();

            $table->foreign('id_promotion')->references('id')->on('promotions');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('relations_utilisateurs',function(Blueprint $table){
            $table->dropForeign('id_promotion');
            $table->dropForeign('id_user');
        });
        Schema::dropIfExists('relations_utilisateurs');
    }
}
