<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalonsUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salons_utilisateurs', function (Blueprint $table) {
            $table->bigInteger('id_user');
            $table->bigInteger('id_salon');
            $table->timestamps();

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
        Schema::table('salons_utilisateurs',function(Blueprint $table){
            $table->dropForeign('id_user');
            $table->dropForeign('id_salon');
        });
        Schema::dropIfExists('salons_utilisateurs');
    }
}
