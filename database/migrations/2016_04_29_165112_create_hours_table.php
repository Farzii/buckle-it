<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoursTable extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('hours', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('requirement_id');
            $table->integer('ticket_id');
            $table->float('hours');
            $table->text('description');
            $table->integer('user_created')->nullable();
            $table->integer('user_updated')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('hours');
    }
}
