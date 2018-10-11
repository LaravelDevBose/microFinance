<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('m_name');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('spouce_name')->nullable();
            $table->string('dob');
            $table->string('nid_number');
            $table->string('phone_number');
            $table->string('email')->nullable();
            $table->text('present_address')->nullable();
            $table->text('premanent_address')->nullable();
            $table->text('member_image')->nullable();
            $table->text('mamber_nid')->nullable();
            $table->text('extra_note')->nullable();
            $table->char('status')->nullable();
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
        Schema::dropIfExists('members');
    }
}
