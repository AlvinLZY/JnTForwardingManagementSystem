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
            $table->integer('scheduleID')->nullable()->default(null);
            $table->timestamps();
            
           /* DB::statement("INSERT INTO `delivery_orders` (`orderID`, `senderID`, `receiverID`, `totalWeight`, `parcelContentCategory`, `scheduleID`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 123, 'Document', 11, NULL, NULL),
(2, 2, 1, 31231, 'Food', 12, NULL, NULL),
(3, 1, 3, 2134, 'Book', 9, NULL, NULL),
(4, 1, 4, 231, 'Electronics', 9, NULL, NULL),
(5, 1, 3, 123, 'Book', 9, NULL, NULL),
(6, 1, 4, 31231, 'Electronics', 9, NULL, NULL),
(7, 1, 2, 163, 'Clothes', 11, NULL, NULL),
(8, 2, 4, 11, 'Documents', 9, NULL, NULL),
(9, 1, 2, 123, 'Document', 11, NULL, NULL),
(10, 2, 1, 31231, 'Food', 13, NULL, NULL),
(11, 1, 3, 2134, 'Book', 9, NULL, NULL),
(12, 1, 4, 231, 'Electronics', 9, NULL, NULL),
(13, 1, 3, 123, 'Book', 9, NULL, NULL),
(14, 1, 4, 31231, 'Electronics', 9, NULL, NULL),
(15, 1, 2, 163, 'Clothes', 11, NULL, NULL),
(16, 2, 4, 11, 'Documents', 9, NULL, NULL),
(17, 1, 4, 231, 'Electronics', 10, NULL, NULL),
(18, 1, 4, 31231, 'Electronics', 10, NULL, NULL),
(19, 2, 4, 11, 'Documents', 10, NULL, NULL),
(20, 1, 4, 231, 'Electronics', 10, NULL, NULL),
(21, 1, 4, 31231, 'Electronics', 10, NULL, NULL),
(22, 2, 4, 11, 'Documents', 10, NULL, NULL),
(23, 1, 2, 163, 'Clothes', 11, NULL, NULL),
(24, 2, 4, 11, 'Documents', 10, NULL, NULL),
(25, 1, 2, 123, 'Document', NULL, NULL, NULL),
(26, 1, 3, 2134, 'Book', 10, NULL, NULL),
(27, 1, 3, 123, 'Book', 10, NULL, NULL),
(28, 2, 4, 11, 'Documents', 10, NULL, NULL),
(29, 1, 4, 231, 'Electronics', NULL, NULL, NULL),
(30, 1, 4, 31231, 'Electronics', NULL, NULL, NULL),
(31, 2, 4, 11, 'Documents', NULL, NULL, NULL),
(32, 1, 4, 231, 'Electronics', NULL, NULL, NULL),
(33, 2, 4, 11, 'Documents', NULL, NULL, NULL);");*/
        });
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
