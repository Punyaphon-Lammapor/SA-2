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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->char('firstname', 20);
            $table->char('lastname', 20);
            $table->char('address', 100);
            $table->foreignIdFor(\App\Models\Province::class); //province_id
            $table->string('postal_code', 5);
            $table->string('phone_number', 10)->unique();
            $table->char('email', 30)->unique()->nullable();
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
        Schema::dropIfExists('customers');
    }
};
