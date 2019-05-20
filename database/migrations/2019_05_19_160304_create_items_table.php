<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('quantity');
            $table->decimal('unitcost', 11, 2)->default(0);
            $table->decimal('discount', 11, 2)->default(0);
            $table->decimal('total', 11, 2)->default(0);
            $table->decimal('vattotal', 11, 2)->default(0);
            $table->decimal('subtotal', 11, 2)->default(0);
            $table->decimal('grandtotal', 11, 2)->default(0);
            $table->decimal('org_id');
            $table->decimal('invoice_id');
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
        Schema::dropIfExists('items');
    }
}
