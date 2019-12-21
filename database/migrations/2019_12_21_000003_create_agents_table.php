<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->integer('phone');

            $table->string('address');

            $table->string('facebook')->nullable();

            $table->string('twitter')->nullable();

            $table->string('instagram')->nullable();

            $table->string('type')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
