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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->char('name', 20);
            $table->char('description', 100)->nullable();
            $table->integer('height');
            $table->decimal('width', 3, 2);
            $table->integer('price');
            $table->foreignIdFor(\App\Models\Order::class); //order_id
            $table->foreignIdFor(\App\Models\ProductStatus::class); //product_ststus_id
            $table->char('picture', 20)->nullable();
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
};
