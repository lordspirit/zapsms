<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationSublocationPivotTable extends Migration
{
    public function up()
    {
        Schema::create('location_sublocation', function (Blueprint $table) {
            $table->unsignedBigInteger('sublocation_id');
            $table->foreign('sublocation_id', 'sublocation_id_fk_3525876')->references('id')->on('sublocations')->onDelete('cascade');
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id', 'location_id_fk_3525876')->references('id')->on('locations')->onDelete('cascade');
        });
    }
}
