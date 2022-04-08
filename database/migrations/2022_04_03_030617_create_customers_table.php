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
            $table->bigIncrements('id');
            $table->string('firstName', 30);
            $table->string('lastName', 30);
            $table->string('contactNo');
            $table->string('email');
            $table->timestamps();
        });
        
        /*DB::statement("INSERT INTO customers (id, firstName, lastName, contactNo, email, created_at, updated_at) VALUES
                                            (1001, 'Loke', 'Choon Keat', '0112365986', 'loke@gmail.com', NULL, NULL),
                                            (1002, 'Alvin', 'LZY', '634563456', 'alvin@gmail.com', NULL, NULL),
                                            (1003, 'george', 'XR', '123123123', 'george@gmail.com', NULL, NULL),
                                            (1004, 'vc', 'lvc', '2131313', 'lvc@gmail.com', NULL, NULL);");*/
        DB::statement("ALTER TABLE customers AUTO_INCREMENT = 1005;");
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
