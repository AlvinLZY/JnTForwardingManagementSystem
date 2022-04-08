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
        Schema::create('transports', function (Blueprint $table) {
            $table->increments('transportID');
            $table->string('carType');
            $table->string('carPlate');
            $table->string('driverID');
            $table->timestamps();
        });
        
        DB::statement("INSERT INTO `transports` (`transportID`, `carType`, `carPlate`, `driverID`, `created_at`, `updated_at`) VALUES
                                            (1, 'Lori', 'PAK 2386', '1', NULL, NULL),
                                            (2, 'LORI', 'PAK 2336', '123', NULL, NULL);");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transports');
    }
};
