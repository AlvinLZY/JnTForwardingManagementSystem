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
            $table->id();
            $table->string('username')->unique();
            $table->string('staffFirstName', 30);
            $table->string('staffLastName', 30);
            $table->string('contactNo');
            $table->string('email');
            $table->timestamps();

            /*DB::statement("INSERT INTO `staff` (`id`, `username`, `staffFirstName`, `staffLastName`, `contactNo`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ID1001', 'Alvin', 'Lim', '01128678751', 'alvin@gmail.com', '123123123123', NULL, NULL, NULL),
(2, 'ID1002', 'Alan', 'Lim', '01128678751', 'alvin@gmail.com', '123123123123', NULL, NULL, NULL),
(3, 'ID1003', 'Alice', 'Leong', '213123123', 'alice@gmail.com', '31231231312312', NULL, NULL, NULL);");*/
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
