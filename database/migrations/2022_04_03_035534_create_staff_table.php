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
        Schema::create('staff', function (Blueprint $table) {
            $table->integer('staffID', true);
            $table->string('staffFirstName', 30);
            $table->string('staffLastName', 30);
            $table->text('contactNo');
            $table->text('email');
            $table->longText('password');
            $table->boolean('loginStatus');
            $table->integer('workingHour');
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
        Schema::dropIfExists('staff');
    }
};
