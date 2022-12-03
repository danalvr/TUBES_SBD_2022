<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('level_id')->references('id')->on('levels');
        });

        Schema::table('books', function (Blueprint $table) {
            $table->foreign('supplier_id')->references('id')->on('users');
        });

        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign('cashier_id')->references('id')->on('users');
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            //
        });
    }
}
