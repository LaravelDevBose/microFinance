<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->string('username',100)->unique();
            $table->string('email',100)->unique();
            $table->string('phone_num');
            $table->text('avater')->nullable();
            $table->string('status',10);
            $table->string('password');
            $table->rememberToken();
            $table->created_updated_by();
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
        Schema::dropIfExists('admins');
    }
}
