<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontakt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontakt', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('ime');
            $table->string('prezime');
            $table->string('broj');
            $table->timestamps();
            //string img -> ime slike
            //dsadsadsadas.jpg
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kontakt');
    }
}
