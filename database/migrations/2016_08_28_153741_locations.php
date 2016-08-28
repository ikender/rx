<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Locations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('locations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 100);
            $table->string('address', 100);
            $table->string('city', 50);
            $table->string('state', 2);
            $table->char('zip', 6);
            $table->decimal('latitude', 8, 6);
            $table->decimal('longitude', 9, 6);
            $table->timestamps();
            $table->index(['latitude', 'longitude']);
        });
 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
