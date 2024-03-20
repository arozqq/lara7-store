<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('product_name');
            $table->string('slug');
            $table->integer('harga');
            $table->integer('stok');
            $table->string('gender');
            $table->text('deskripsi')->nullable();
            $table->string('thumbnail')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
            $table->foreignId('brand_id')->nullable()->references('id')->on('brands')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('category_id')->constrained();
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
