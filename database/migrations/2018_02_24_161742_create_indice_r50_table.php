<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\IndiceR50;

class CreateIndiceR50Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indices_r50', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('mev', IndiceR50::getMeVs());
            $table->double('r50', 10, 3)->nullable();
            $table->double('input_1', 10, 3)->nullable();
            $table->double('input_2', 10, 3)->nullable();
            $table->double('input_3', 10, 3)->nullable();
            $table->double('input_4', 10, 3)->nullable();
            $table->double('k_qqint', 10, 3)->nullable();
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
        Schema::dropIfExists('indices_r50');
    }
}
