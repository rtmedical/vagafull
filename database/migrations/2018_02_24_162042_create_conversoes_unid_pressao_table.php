<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConversoesUnidPressaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversoes_unid_pressao', function (Blueprint $table) {
            $table->increments('id');
            $table->double('mmhg', 10, 3)->nullable();
            $table->double('mbar', 10, 3)->nullable();
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
        Schema::dropIfExists('conversoes_unid_pressao');
    }
}
