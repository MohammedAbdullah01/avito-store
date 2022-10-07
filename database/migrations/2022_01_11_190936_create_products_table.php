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
            $table->boolean('activate')->default(0);
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('description');
            $table->unsignedFloat('price');
            $table->unsignedFloat('sale_price')->nullable();
            $table->unsignedInteger('quantity')->nullable();
            $table->string('sku')->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('main_picture')->default('default.png');

            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('supplier_id')->nullable()->constrained('suppliers')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('admin_id')->nullable()->constrained('admins')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->timestamps();
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
