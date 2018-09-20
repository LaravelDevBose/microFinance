<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('emply_id');
            $table->string('emply_name');
            $table->unsignedInteger('desig_id')->default(1);
            $table->unsignedInteger('dept_id')->default(1);
            $table->timestamp('joining_date');
            $table->unsignedInteger('salary');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('dob');
            $table->boolean('gender')->default(0);
            $table->smallInteger('marital_status')->default(0);
            $table->string('nid_num')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('email')->nullable();
            $table->text('present_address')->nullable();
            $table->text('parmanent_address')->nullable();
            $table->text('image')->nullable();
            $table->text('employee_cv')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('employee_infos');
    }
}
