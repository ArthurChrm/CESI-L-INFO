<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions_utilisateurs', function (Blueprint $table) {
            $table->bigInteger('id_user');
            $table->bigInteger('id_promotion');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('user');
            $table->foreign('id_promotion')->references('id')->on('promotions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('promotions_utilisateurs',function(Blueprint $table){
            $table->dropForeign('id_user');
            $table->dropForeign('id_promotion');
        });
        Schema::dropIfExists('promotions_utilisateurs');
    }
}
