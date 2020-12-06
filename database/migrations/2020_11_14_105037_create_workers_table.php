<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
            $table->string('special', 100);
            $table->unsignedSmallInteger('vts');
            $table->unsignedSmallInteger('gts');
            $table->unsignedSmallInteger('kab')->unsigned();
            $table->string('pc_name', 20);
            $table->boolean('ammy')->default(false);
            $table->tinyInteger('otdel_id1');
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
        Schema::dropIfExists('workers');
    }
}
