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
        Schema::create('schedules', function (Blueprint $table) {
            $table->integer('scheduleID', true);
            $table->integer('driverID');
            $table->integer('transportID');
            $table->integer('destRegionID');
            $table->dateTime('dateTimeDelivery');
            $table->boolean('isDelivered')->default(0);
            $table->timestamps();
            
            /*DB::statement("INSERT INTO `schedules` (`scheduleID`, `driverID`, `transportID`, `destRegionID`, `dateTimeDelivery`, `isDelivered`, `created_at`, `updated_at`) VALUES
(9, 2, 1, 3, '2022-04-08 21:56:00', 0, '2022-04-08 13:56:12', '2022-04-08 13:56:12'),
(10, 1, 1, 4, '2022-04-29 10:00:00', 0, '2022-04-08 14:06:56', '2022-04-08 14:07:04'),
(11, 2, 2, 2, '2022-04-08 10:00:00', 0, '2022-04-08 14:24:01', '2022-04-08 14:24:01'),
(12, 1, 1, 1, '2022-04-08 10:00:00', 0, '2022-04-08 14:24:07', '2022-04-08 14:24:07'),
(13, 1, 1, 1, '2022-04-08 10:00:00', 0, '2022-04-08 14:24:22', '2022-04-08 14:24:22');");*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};
