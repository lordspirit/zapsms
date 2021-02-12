<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductProductLocationPivotTable extends Migration
{
    public function up()
    {
        Schema::create('product_product_location', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'product_id_fk_3177263')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('product_location_id');
            $table->foreign('product_location_id', 'product_location_id_fk_3177263')->references('id')->on('product_locations')->onDelete('cascade');
        });
    }
}
