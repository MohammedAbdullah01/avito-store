<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('number')->unique();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('first_name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('city');
            $table->string('post_alcode');
            $table->string('country');

            $table->unsignedFloat('tax')->default(0);
            $table->unsignedFloat('discount')->default(0);
            $table->unsignedFloat('total')->default(0);
            
            $table->enum('status' , ['pending' , 'paid' , 'shipped', 'processing'  , 'completed' , 'canceled'])->default('pending');
            $table->enum('payment_status' , ['pending' , 'paid' , 'faild'])->default('pending');
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
        Schema::dropIfExists('orders');
    }
}
