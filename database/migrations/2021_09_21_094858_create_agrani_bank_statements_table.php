<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgraniBankStatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agrani_bank_statements', function (Blueprint $table) {
            $table->id();
            $table->string ('trans_date')->nullable();
            $table->string('trans_type')->nullable();
            $table->string('rf_br')->nullable();
            $table->string('particular')->nullable();
            $table->integer('cheque_no')->nullable();
            $table->integer('dr_amount')->nullable();
            $table->integer('cr_amount')->nullable();
            $table->integer('balance')->nullable();
            $table->string('dr_cr')->nullable();
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
        Schema::dropIfExists('agrani_bank_statements');
    }
}
