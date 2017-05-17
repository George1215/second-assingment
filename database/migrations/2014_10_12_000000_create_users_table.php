<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('password');
            $table->string('phone');
            $table->string('role')->default(2);
            $table->rememberToken();
            $table->timestamps();
        });

        // Insert admin
        DB::table('users')->insert(
            array(
                'username'=> 'admin',
                'email' => 'name@domain.com',
                'first_name' => 'admin',
                'last_name' => 'admin',
                'phone' => '3454364',
                'password'=> bcrypt("123456"),
                'role'=> '1',
                'created_at'=> Carbon::now(),
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
