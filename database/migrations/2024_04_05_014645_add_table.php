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
        Schema::table('shop_carts', function (Blueprint $table) {
            $table->string('invoice_id')->nullable();
            $table->string('tckn')->nullable();
            $table->string('error_code')->nullable();
            $table->string('error_message')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shop_carts', function (Blueprint $table) {
            //
        });
    }
};
