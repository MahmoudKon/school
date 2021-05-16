<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('absence_id');
            $table->double('salary', 15, 2)->default(0.00);
            $table->double('deduction', 15, 2)->nullable()->default(0.00);
            $table->double('incentives', 15, 2)->nullable()->default(0.00);
            $table->double('rate', 15, 2)->nullable()->default(0.00);
            $table->text('note')->nullable();
            $table->timestamps();

            $table->foreign('absence_id')->references('id')->on('absences')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salaries');
    }
}
