<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->double('norm1', 8, 2)->nullable();	
            $table->string('unit1', 10)->nullable();
            $table->double('norm2', 8, 2)->nullable();
            $table->string('unit2', 10)->nullable();
            $table->double('norm3', 8, 2)->nullable();
            $table->string('unit3', 10)->nullable();
            $table->double('working_hours', 8, 2)->nullable();
            $table->double('working_minutes', 8, 2)->nullable();
            $table->double('tick_minutes', 8, 2)->nullable();
            $table->integer('workers_number')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');


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
        Schema::dropIfExists('machines');
    }
}
