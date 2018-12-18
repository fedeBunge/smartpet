<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150)->nullable(false);
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('brand_id')->nullable();
            $table->unsignedInteger('animal_id')->nullable();
            $table->string('description', 500);
            $table->string('image')->default('default-producto.png');
            $table->unsignedDecimal('price',8,2);
            $table->timestamps();
            $table->unsignedInteger('active')->default(1);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
