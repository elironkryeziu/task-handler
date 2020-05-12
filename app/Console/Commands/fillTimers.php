<?php

namespace App\Console\Commands;

use App\TimerSaw;
use Carbon\Carbon;
use App\TimerAkron;
use App\TimerHomag;
use App\TimerPress;
use App\TimerSelco;
use App\TimerMontaz;
use App\TimerSkiper;
use App\TimerUkocia;
use App\TimerKartony;
use App\TimerPacking;
use App\TimerBiesseB1;
use App\TimerBiesseSb;
use App\TimerFrezarki;
use App\TimerBiesseFdt;
use App\TimerUkosiarki;
use App\TimerDolnowrzecionowki;
use Illuminate\Console\Command;

class fillTimers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'timers:fill';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fill timers with data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->fillTimer('selco', '08:00', '10:30', 10, 1);
        // $this->fillTimer('press', '08:00', '10:30', 10, 1);
    
    }

    public function fillTimer($machine, $start, $finish, $tick_time_minutes, $shift)
    {
        $start = new Carbon($start);
        $break_1 = new Carbon($finish);
        $cycles = ($break_1->diffInMinutes($start))/$tick_time_minutes;
        
        switch ($machine) {
            case 'selco':

                for ($i = 1; $i <= $cycles; $i++) {
                    $timer = TimerSelco::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                            'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'done' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            case 'akron':
                for ($i = 1; $i <= $cycles; $i++) {
                    $timer = TimerAkron::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                            'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'done' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            case 'biesse-b1':
                for ($i = 1; $i <= $cycles; $i++) {
                    $timer = TimerBiesseB1::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                            'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'done' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            case 'biesse-fdt':
                for ($i = 1; $i <= $cycles; $i++) {
                    $timer = TimerBiesseFdt::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                            'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'done' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            case 'biesse-sb':
                for ($i = 1; $i <= $cycles; $i++) {
                    $timer = TimerBiesseSb::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                            'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'done' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            case 'dolnowrzecionowki':
                for ($i = 1; $i <= $cycles; $i++) {
                    $timer = TimerDolnowrzecionowki::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                            'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'done' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            case 'frezarki':
                for ($i = 1; $i <= $cycles; $i++) {
                    $timer = TimerFrezarki::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                            'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'done' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            case 'homag':
                for ($i = 1; $i <= $cycles; $i++) {
                    $timer = TimerHomag::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                            'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'done' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            case 'kartony':
                for ($i = 1; $i <= $cycles; $i++) {
                    $timer = TimerKartony::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                            'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'done' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            case 'montaz':
                for ($i = 1; $i <= $cycles; $i++) {
                    $timer = TimerMontaz::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                            'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'done' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            case 'packing':
                for ($i = 1; $i <= $cycles; $i++) {
                    $timer = TimerPacking::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                            'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'done' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            case 'press':
                for ($i = 1; $i <= $cycles; $i++) {
                    $timer = TimerPress::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                            'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'done' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            case 'saw':
                for ($i = 1; $i <= $cycles; $i++) {
                    $timer = TimerSaw::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                            'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'done' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            case 'skiper':
                for ($i = 1; $i <= $cycles; $i++) {
                    $timer = TimerSkiper::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                            'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'done' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            case 'ukocia':
                for ($i = 1; $i <= $cycles; $i++) {
                    $timer = TimerUkocia::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                            'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'done' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            case 'ukosiarki':
                for ($i = 1; $i <= $cycles; $i++) {
                    $timer = TimerUkosiarki::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                            'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'done' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            default:
                break;
        }
        echo "Timer " . $machine . " filled with data until " . $finish;

    }
}
