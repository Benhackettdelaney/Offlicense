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
        // Schema::create('brand_drink', function (Blueprint $table) {
            // $table->id();
            // $table->unsignedBigInteger('brand_id');
            // $table->unsignedBigInteger('drink_id');

            // $table->foreign('brand_id')->references('id')->on('brands')->onUpdate('cascade')->onDelete('restrict');
            // $table->foreign('drink_id')->references('id')->on('drinks')->onUpdate('cascade')->onDelete('restrict');
            // $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brand_drink');
    }
};