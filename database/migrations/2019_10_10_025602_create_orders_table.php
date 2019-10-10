<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uuid', 36);
            $table->bigInteger('employees_id')->unsigned();
            $table->bigInteger('customers_id')->unsigned();
            $table->bigInteger('products_id')->unsigned();

			$table
			->foreign('employees_id')
			->references('id')
			->on('employees')
			->onDelete('restrict')
			->onUpdate('restrict');

			$table
			->foreign('customers_id')
			->references('id')
			->on('customers')
			->onDelete('restrict')
			->onUpdate('restrict');

			$table
			->foreign('products_id')
			->references('id')
			->on('products')
			->onDelete('restrict')
			->onUpdate('restrict');

            $table->timestamps();
			$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
