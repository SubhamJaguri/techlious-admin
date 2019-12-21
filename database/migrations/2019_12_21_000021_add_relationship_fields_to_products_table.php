<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedInteger('agent_id')->nullable();

            $table->foreign('agent_id', 'agent_fk_758155')->references('id')->on('agents');

            $table->unsignedInteger('location_id')->nullable();

            $table->foreign('location_id', 'location_fk_761337')->references('id')->on('locations');
        });
    }
}
