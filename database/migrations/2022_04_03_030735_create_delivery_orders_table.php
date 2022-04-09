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
        Schema::create('delivery_orders', function (Blueprint $table) {
            $table->integer('orderID', true);
            $table->integer('senderID');
            $table->integer('receiverID');
            $table->float('totalWeight', 10, 0);
            $table->string('parcelContentCategory', 30);
            $table->integer('scheduleID');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE delivery_orders AUTO_INCREMENT = 1001;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_orders');
    }
};
