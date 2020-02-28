<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Rang;

class CreateRangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rang_name');
            $table->timestamps();
        });

        $etudiant = new Rang();
        $etudiant->rang_name = "Etudiant";
        $etudiant->save();

        $intervenant = new Rang();
        $intervenant->rang_name = "Intervenant";
        $intervenant->save();

        $pilote_promotion = new Rang();
        $pilote_promotion->rang_name = "Pilote de promotion";
        $pilote_promotion->save();

        $Administration = new Rang();
        $Administration->rang_name = "Intervenant";
        $Administration->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rangs');
    }
}
