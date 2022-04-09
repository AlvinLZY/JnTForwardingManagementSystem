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
        
        DB::statement("INSERT INTO `addresses` (`addressID`, `regionID`, `address`, `customerID`, `created_at`, `updated_at`) VALUES
(1, 1, '123, Jalan Muhibah, Taman Botani', 1001, '2022-04-08 23:32:19', '2022-04-08 23:32:19'),
(2, 1, '432, Jalan Gopeng, Taman Rapat', 1002, '2022-04-08 23:35:42', '2022-04-08 23:35:42'),
(3, 2, '321, Jalan Belimbing, Taman Belimbing', 1003, '2022-04-08 23:36:18', '2022-04-08 23:36:18'),
(4, 3, '12, Jalan Nanas, Taman Buah', 1004, '2022-04-08 23:36:53', '2022-04-08 23:36:53'),
(5, 4, '99, Jalan Mulia, Taman Bestari', 1005, '2022-04-08 23:37:28', '2022-04-08 23:37:28');");
        DB::statement("ALTER TABLE addresses AUTO_INCREMENT = 6;");
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