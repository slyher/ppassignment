<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
		$table->bigIncrements('id');
		$table->string('name', 150);
		$table->string('town_name',200);
		$table->unsignedBigInteger('population');
		$table->unsignedDecimal('surface', 10, 4);
		$table->unique(['name','town_name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('districts');
    }
}
