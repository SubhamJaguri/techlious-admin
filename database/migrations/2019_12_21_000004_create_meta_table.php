<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetaTable extends Migration
{
    public function up()
    {
        Schema::create('meta', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('object')->nullable();

            $table->string('model')->nullable();

            $table->string('key');

            $table->string('value');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
