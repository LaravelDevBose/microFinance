<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberAccountInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_account_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('m_id');
            $table->unsignedInteger('member_id');
            $table->unsignedInteger('instalment_type');
            $table->unsignedInteger('inst_amount');
            $table->timestamp('opening_date');
            $table->string('area')->nullable();
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
        Schema::dropIfExists('member_account_infos');
    }
}
