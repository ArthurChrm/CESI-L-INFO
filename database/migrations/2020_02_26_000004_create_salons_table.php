<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Salon;

class CreateSalonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('salon_name',100);
            $table->timestamps();
        });

        $salon1 = new Salon();
        $salon1->salon_name = "Salon debug 1";
        $salon1->save();

        $salon2 = new Salon();
        $salon2->salon_name = "Salon debug 2";
        $salon2->save();

        $salon3 = new Salon();
        $salon3->salon_name = "Salon debug 3";
        $salon3->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salons');
    }
}
