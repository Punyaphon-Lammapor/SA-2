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
        Schema::create('useds', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Product::class); //product_id
            $table->foreignIdFor(\App\Models\Material::class); //material_id
            $table->integer('used_qty');
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
        Schema::dropIfExists('useds');
    }
};
