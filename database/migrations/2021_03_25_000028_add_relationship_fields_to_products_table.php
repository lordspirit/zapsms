<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_3509094')->references('id')->on('product_categories');
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->foreign('sub_category_id', 'sub_category_fk_3509156')->references('id')->on('sub_categories');
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id', 'location_fk_3509268')->references('id')->on('locations');
            $table->unsignedBigInteger('sub_location_id')->nullable();
            $table->foreign('sub_location_id', 'sub_location_fk_3509269')->references('id')->on('sublocations');
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id', 'brand_fk_3509383')->references('id')->on('brands');
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->foreign('supplier_id', 'supplier_fk_3509384')->references('id')->on('suppliers');
            $table->unsignedBigInteger('units_id')->nullable();
            $table->foreign('units_id', 'units_fk_3525867')->references('id')->on('units');
        });
    }
}
