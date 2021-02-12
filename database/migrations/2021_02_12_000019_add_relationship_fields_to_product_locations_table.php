<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductLocationsTable extends Migration
{
    public function up()
    {
        Schema::table('product_locations', function (Blueprint $table) {
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id', 'location_fk_3177124')->references('id')->on('product_locations');
        });
    }
}
