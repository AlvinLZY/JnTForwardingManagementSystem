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
        Schema::create('regions', function (Blueprint $table) {
            $table->integer('regionID')->id();
            $table->integer('postcode');
            $table->string('city', 50);
            $table->string('state', 50);
            $table->timestamps();
        });
        
        DB::statement("INSERT INTO `regions` (`regionID`, `postcode`, `city`, `state`, `created_at`, `updated_at`) VALUES
                                            (1, 31450, 'Ipoh', 'Perak', NULL, NULL),
                                            (2, 31900, 'Kampar', 'Perak', NULL, NULL),
                                            (3, 13540, 'Kepong', 'Selangor', NULL, NULL),
                                            (4, 56413, 'Bukit Mertajam', 'Penang', NULL, NULL);");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regions');
    }
};