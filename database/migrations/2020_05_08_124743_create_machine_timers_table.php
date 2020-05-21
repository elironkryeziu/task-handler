<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineTimersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $machines = array("timer_selco", "timer_press", "timer_homag",
                        "timer_biesse_sb", "timer_biesse_b1", "timer_akron",
                        "timer_skiper", "timer_biesse_fdt", "timer_saw",
                        "timer_frezarki", "timer_dolnowrzecionowki", "timer_ukosiarki",
                        "timer_okucia", "timer_packing", "timer_kartony", "timer_montaz");

        foreach($machines as $machine)
        {
            Schema::create($machine, function (Blueprint $table) {
                $table->id();
                $table->time('start_time', 0)->nullable();
                $table->char('number', 5)->nullable();
                $table->time('tick_time', 0)->nullable();
                $table->double('to_do_pcs', 8, 2)->nullable();
                $table->double('to_do_cbm', 8, 4)->nullable();
                $table->double('done_pcs', 8, 2)->nullable();
                $table->double('done_cbm', 8, 2)->nullable();
                $table->integer('shift')->nullable();
           
                $table->timestamps();
            });

        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timer_selco');
        Schema::dropIfExists('timer_press');
        Schema::dropIfExists('timer_homag');
        Schema::dropIfExists('timer_biesse_sb');
        Schema::dropIfExists('timer_biesse_b1');
        Schema::dropIfExists('timer_akron');
        Schema::dropIfExists('timer_skiper');
        Schema::dropIfExists('timer_biesse_fdt');
        Schema::dropIfExists('timer_saw');
        Schema::dropIfExists('timer_frezarki');
        Schema::dropIfExists('timer_dolnowrzecionowki');
        Schema::dropIfExists('timer_ukosiarki');
        Schema::dropIfExists('timer_okucia');
        Schema::dropIfExists('timer_packing');
        Schema::dropIfExists('timer_kartony');
        Schema::dropIfExists('timer_montaz');
    }
}
