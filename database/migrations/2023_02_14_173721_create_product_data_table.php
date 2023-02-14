<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_data', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('product_name');
            $table->string('category');
            $table->string('subcategory');
            $table->double('price_£');
            $table->string('price_per');
            $table->string('ingredients');
            $table->string('allergen information');
            $table->string('recycling_information');
            $table->string('link');
            $table->string('brand_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_data');
    }
};
