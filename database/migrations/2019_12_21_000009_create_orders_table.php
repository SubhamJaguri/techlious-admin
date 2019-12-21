<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            $table->decimal('price', 15, 2);

            $table->boolean('is_valid')->default(0)->nullable();

            $table->datetime('valid_from')->nullable();

            $table->datetime('valid_till')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
