<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDecaimentos60CoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decaimentos_60co', function (Blueprint $table) {
            $table->increments('id');
            $table->date('input_1')->nullable();
            $table->double('input_2', 10, 3)->nullable();
            $table->date('input_3')->nullable();
            $table->double('output_1', 10, 3)->nullable();
            $table->date('output_2')->nullable();
            $table->double('output_3', 10, 3)->nullable();
            $table->integer('spreadsheet_id')->unsigned();
            $table->foreign('spreadsheet_id')
                ->references('id')
                ->on('spreadsheets')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('decaimentos_60co');
    }
}
