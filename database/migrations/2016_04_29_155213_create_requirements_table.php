<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('requirements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->integer('parent_id')->default(0);
            $table->string('reference_number',255);
            $table->float('estimated_hours');
            $table->integer('status')->default(0);
            $table->string('title',255);
            $table->text('description');
            $table->integer('developer_assigned')->nullable();
            $table->integer('tester_assigned')->nullable();
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
       Schema::drop('requirements');
    }
}
