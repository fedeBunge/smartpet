<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingKeyToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
          $table->foreign('category_id')->references('id')->on('categories');
          $table->foreign('brand_id')->references('id')->on('brands');
          $table->foreign('animal_id')->references('id')->on('animals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
          $table->dropForeign('products_category_id_foreign');
          $table->dropForeign('products_brand_id_foreign');
          $table->dropForeign('products_animal_id_foreign');
        });
    }
}
