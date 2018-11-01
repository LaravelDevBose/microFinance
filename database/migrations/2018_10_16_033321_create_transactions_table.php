<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->char('trans_id',50)->comment('DT= DPS, LT=Loan');
            $table->char('trans_type',5)->comment('D= DPS, L=Loan');
            $table->unsignedInteger('payment_type')->comment('1= Receive, 0=payment');
            $table->timestamps('trans_date')->useCurrent();
            $table->unsignedInteger('member_id');
            $table->unsignedInteger('amount');
            $table->string('short_note');
            $table->char('status',5)->comment('a= active, d=delete');
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
        Schema::dropIfExists('transactions');
    }
}
