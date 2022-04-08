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
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('addressID')->id();
            $table->integer('regionID');
            $table->string('address', 100);
            $table->bigInteger('customerID',false,true);
            $table->timestamps();
            
            $table->foreign('customerID')->references('id')->on('customers')->onDelete('cascade');
        });
        
        DB::statement("ALTER TABLE addresses AUTO_INCREMENT = 1;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
};