<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('status')->default(0)->nullable();
            $table->float('quantity', 6, 2)->nullable();
            $table->string('ipaddress')->nullable();
            $table->string('serialnumber')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
