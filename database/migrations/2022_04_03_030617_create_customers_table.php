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
        
        DB::statement("INSERT INTO `customers` (`id`, `firstName`, `lastName`, `contactNo`, `email`, `created_at`, `updated_at`) VALUES
(1001, 'Zhen Hoong', 'Ng', '01133828859', 'zhenhongng@gmail.com', '2022-04-08 23:32:19', '2022-04-08 23:32:19'),
(1002, 'Kai Xuan', 'Chen', '01298867626', 'kxchen@gmail.com', '2022-04-08 23:35:42', '2022-04-08 23:35:42'),
(1003, 'Gee Mui', 'Tan', '01299384773', 'gmtan@gmail.com', '2022-04-08 23:36:18', '2022-04-08 23:36:18'),
(1004, 'Wei Li', 'Tehw', '01432847135', 'wltewh@gmail.com', '2022-04-08 23:36:53', '2022-04-08 23:36:53'),
(1005, 'Yee Shuang', 'Ang', '01923775123', 'ysang@gmail.com', '2022-04-08 23:37:28', '2022-04-08 23:37:28');");
        DB::statement("ALTER TABLE customers AUTO_INCREMENT = 1006;");
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
