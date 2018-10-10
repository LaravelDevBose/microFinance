<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNomineeInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nominee_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('member_id');
            $table->string('n_name');
            $table->string('n_relation');
            $table->string('n_phone_number')->nullable();
            $table->string('n_email')->nullable();
            $table->string('n_address');
            $table->text('n_image')->nullable();
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
        Schema::dropIfExists('nominee_infos');
    }
}
