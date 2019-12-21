<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedInteger('product_id');

            $table->foreign('product_id', 'product_fk_758318')->references('id')->on('products');

            $table->unsignedInteger('user_id');

            $table->foreign('user_id', 'user_fk_758319')->references('id')->on('users');
        });
    }
}
