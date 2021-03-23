<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategorySubCategoryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('product_category_sub_category', function (Blueprint $table) {
            $table->unsignedBigInteger('sub_category_id');
            $table->foreign('sub_category_id', 'sub_category_id_fk_3509090')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->unsignedBigInteger('product_category_id');
            $table->foreign('product_category_id', 'product_category_id_fk_3509090')->references('id')->on('product_categories')->onDelete('cascade');
        });
    }
}
