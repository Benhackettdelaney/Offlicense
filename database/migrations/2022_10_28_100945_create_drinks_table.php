<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
// the migrations are so that we can create and change the database tables and columns 
    //  the up function is used for adding new indexes, tables and columns to the databse that we created
    /**
     * Run the migrations.
     *
     * @return void
     */
    // this code below displays the tables for the database
    public function up()
    {
        Schema::create('drinks', function (Blueprint $table) {
            $table->id();
            $table->String('name');
            $table->float('price');
            $table->integer('quantity');
            $table->integer('alcohol_level');
            $table->timestamps();
        });
    }
// the down function reverses the changes made by the up function
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drinks');
    }
};

// this is migrated to the database to be filled with information by the seeder and factory