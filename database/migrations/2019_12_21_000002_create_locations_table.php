<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->float('from_main_gate', 15, 2)->nullable();

            $table->float('longitude', 15, 2)->nullable();

            $table->string('latitude')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
