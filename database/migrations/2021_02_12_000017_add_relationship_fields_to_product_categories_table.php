<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('product_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->foreign('subcategory_id', 'subcategory_fk_3177102')->references('id')->on('product_categories');
        });
    }
}
