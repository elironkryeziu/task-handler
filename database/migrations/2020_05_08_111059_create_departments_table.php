<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->char('number', 10)->nullable();
            $table->char('name', 50)->nullable();
            $table->time('shift_1_start', 0)->nullable();
            $table->time('break_1_start', 0)->nullable();
            $table->time('break_1_end', 0)->nullable();
            $table->time('shift_1_end', 0)->nullable();
            $table->time('shift_2_start', 0)->nullable();
            $table->time('break_2_start', 0)->nullable();
            $table->time('break_2_end', 0)->nullable();
            $table->time('shift_2_end', 0)->nullable();

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
        Schema::dropIfExists('departments');
    }
}
