<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSublocationsTable extends Migration
{
    public function up()
    {
        Schema::table('sublocations', function (Blueprint $table) {
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id', 'location_fk_3509211')->references('id')->on('locations');
        });
    }
}
