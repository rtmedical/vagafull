<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndiceTPR2010Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indices_tpr2010', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('mv', ['4', '6', '10', '15']);
            $table->double('d20_d10', 10, 3)->nullable();
            $table->double('input_1', 10, 3)->nullable();
            $table->double('input_2', 10, 3)->nullable();
            $table->double('input_3', 10, 3)->nullable();
            $table->double('input_4', 10, 3)->nullable();
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
        Schema::dropIfExists('indices_tpr2010');
    }
}
