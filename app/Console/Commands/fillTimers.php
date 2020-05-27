<?php

namespace App\Console\Commands;

use App\Machine;
use App\TimerSaw;
use Carbon\Carbon;
use App\TimerAkron;
use App\TimerHomag;
use App\TimerPress;
use App\TimerSelco;
use App\TimerMontaz;
use App\TimerSkiper;
use App\TimerOkucia;
use App\TimerKartony;
use App\TimerPacking;
use App\TimerBiesseB1;
use App\TimerBiesseSb;
use App\TimerFrezarki;
use App\TimerBiesseFdt;
use App\TimerUkosiarki;
use App\TimerDolnowrzecionowki;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class fillTimers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'timers:fill {label?}';

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
        // $machines = array("timer_selco", "timer_press", "timer_homag",
        // "timer_biesse_sb", "timer_biesse_b1", "timer_akron",
        // "timer_skiper", "timer_biesse_fdt", "timer_saw",
        // "timer_frezarki", "timer_dolnowrzecionowki", "timer_ukosiarki",
        // "timer_okucia", "timer_packing", "timer_kartony", "timer_montaz");
        
        // foreach($machines as $table)
        // {
        //         DB::table($table)->truncate();
        //         echo "Table ".$table." truncated \n";
        //     }
            
            $machine = Machine::where('label', $this->argument('label'))->first();
            if($machine){
                $todo_minute_pcs = $machine->standard_norm1/$machine->working_minutes;
                $todo_minute_cbm = $machine->standard_norm2/$machine->working_minutes;
    
                $this->fillTimer($machine->label, '08:00', '11:00', $todo_minute_pcs, $todo_minute_cbm, $machine->tick_minutes, 1);
                $this->fillTimer($machine->label, '12:00', '16:00', $todo_minute_pcs, $todo_minute_cbm, $machine->tick_minutes, 2);
    
                echo "Timers for machine " . $machine->name ." are filled. \n";
            }else
            {
                echo "Machine not found \n";
            }
    }

    public function fillTimer($machine, $start, $finish, $do_per_minute_pcs, $do_per_minute_cbm, $tick_time_minutes, $shift)
    {
        $start = new Carbon($start);
        $finish = new Carbon($finish);
        $cycles = ($finish->diffInMinutes($start))/$tick_time_minutes;
        $to_do_pcs = $tick_time_minutes * $do_per_minute_pcs;
        $to_do_cbm = $tick_time_minutes * $do_per_minute_cbm;
        $total_pcs = 0;
        $total_cbm = 0;

        switch ($machine) {
            case 'selco':
                for ($i = 1; $i <= $cycles; $i++) {
                    $total_pcs += $to_do_pcs;
                    $total_cbm += $to_do_cbm;                    
                    $timer = TimerSelco::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                            'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'to_do_pcs' => $total_pcs,
                            'to_do_cbm' => $total_cbm,
                            'done_pcs' => 0,
                            'done_cbm' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            case 'akron':
                for ($i = 1; $i <= $cycles; $i++) {
                    $total_pcs += $to_do_pcs;
                    $total_cbm += $to_do_cbm;
                    $timer = TimerAkron::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                            'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'to_do_pcs' => $total_pcs,
                            'to_do_cbm' => $total_cbm,
                            'done_pcs' => 0,
                            'done_cbm' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            case 'biesse-b1':
                for ($i = 1; $i <= $cycles; $i++) {
                    $total_pcs += $to_do_pcs;
                    $total_cbm += $to_do_cbm;
                    $timer = TimerBiesseB1::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                           'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'to_do_pcs' => $total_pcs,
                            'to_do_cbm' => $total_cbm,
                            'done_pcs' => 0,
                            'done_cbm' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            case 'biesse-fdt':
                for ($i = 1; $i <= $cycles; $i++) {
                    $total_pcs += $to_do_pcs;
                    $total_cbm += $to_do_cbm;
                    $timer = TimerBiesseFdt::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                           'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'to_do_pcs' => $total_pcs,
                            'to_do_cbm' => $total_cbm,
                            'done_pcs' => 0,
                            'done_cbm' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            case 'biesse-sb':
                for ($i = 1; $i <= $cycles; $i++) {
                    $total_pcs += $to_do_pcs;
                    $total_cbm += $to_do_cbm;
                    $timer = TimerBiesseSb::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                           'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'to_do_pcs' => $total_pcs,
                            'to_do_cbm' => $total_cbm,
                            'done_pcs' => 0,
                            'done_cbm' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            case 'dolnowrzecionowki':
                for ($i = 1; $i <= $cycles; $i++) {
                    $total_pcs += $to_do_pcs;
                    $total_cbm += $to_do_cbm;
                    $timer = TimerDolnowrzecionowki::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                           'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'to_do_pcs' => $total_pcs,
                            'to_do_cbm' => $total_cbm,
                            'done_pcs' => 0,
                            'done_cbm' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            case 'frezarki':
                for ($i = 1; $i <= $cycles; $i++) {
                    $total_pcs += $to_do_pcs;
                    $total_cbm += $to_do_cbm;
                    $timer = TimerFrezarki::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                           'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'to_do_pcs' => $total_pcs,
                            'to_do_cbm' => $total_cbm,
                            'done_pcs' => 0,
                            'done_cbm' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            case 'homag':
                for ($i = 1; $i <= $cycles; $i++) {
                    $total_pcs += $to_do_pcs;
                    $total_cbm += $to_do_cbm;
                    $timer = TimerHomag::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                           'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'to_do_pcs' => $total_pcs,
                            'to_do_cbm' => $total_cbm,
                            'done_pcs' => 0,
                            'done_cbm' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            case 'kartony':
                for ($i = 1; $i <= $cycles; $i++) {
                    $total_pcs += $to_do_pcs;
                    $total_cbm += $to_do_cbm;
                    $timer = TimerKartony::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                           'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'to_do_pcs' => $total_pcs,
                            'to_do_cbm' => $total_cbm,
                            'done_pcs' => 0,
                            'done_cbm' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            case 'montaz':
                for ($i = 1; $i <= $cycles; $i++) {
                    $total_pcs += $to_do_pcs;
                    $total_cbm += $to_do_cbm;
                    $timer = TimerMontaz::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                           'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'to_do_pcs' => $total_pcs,
                            'to_do_cbm' => $total_cbm,
                            'done_pcs' => 0,
                            'done_cbm' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            case 'packing':
                for ($i = 1; $i <= $cycles; $i++) {
                    $total_pcs += $to_do_pcs;
                    $total_cbm += $to_do_cbm;
                    $timer = TimerPacking::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                           'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'to_do_pcs' => $total_pcs,
                            'to_do_cbm' => $total_cbm,
                            'done_pcs' => 0,
                            'done_cbm' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            case 'press':
                for ($i = 1; $i <= $cycles; $i++) {
                    $total_pcs += $to_do_pcs;
                    $total_cbm += $to_do_cbm;
                    $timer = TimerPress::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                           'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'to_do_pcs' => $total_pcs,
                            'to_do_cbm' => $total_cbm,
                            'done_pcs' => 0,
                            'done_cbm' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            case 'saw':
                for ($i = 1; $i <= $cycles; $i++) {
                    $total_pcs += $to_do_pcs;
                    $total_cbm += $to_do_cbm;
                    $timer = TimerSaw::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                           'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'to_do_pcs' => $total_pcs,
                            'to_do_cbm' => $total_cbm,
                            'done_pcs' => 0,
                            'done_cbm' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            case 'skiper':
                for ($i = 1; $i <= $cycles; $i++) {
                    $total_pcs += $to_do_pcs;
                    $total_cbm += $to_do_cbm;
                    $timer = TimerSkiper::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                           'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'to_do_pcs' => $total_pcs,
                            'to_do_cbm' => $total_cbm,
                            'done_pcs' => 0,
                            'done_cbm' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            case 'okucia':
                for ($i = 1; $i <= $cycles; $i++) {
                    $total_pcs += $to_do_pcs;
                    $total_cbm += $to_do_cbm;
                    $timer = TimerOkucia::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                           'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'to_do_pcs' => $total_pcs,
                            'to_do_cbm' => $total_cbm,
                            'done_pcs' => 0,
                            'done_cbm' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            case 'ukosiarki':
                for ($i = 1; $i <= $cycles; $i++) {
                    $total_pcs += $to_do_pcs;
                    $total_cbm += $to_do_cbm;
                    $timer = TimerUkosiarki::updateOrCreate(
                        ['created_at' => Carbon::today()->toDateString(), 'start_time' => $start->format('H:i')],
                        [
                            'start_time' => $start->format('H:i'),
                           'tick_time' => $start->addMinutes($tick_time_minutes)->format('H:i'),
                            'to_do_pcs' => $total_pcs,
                            'to_do_cbm' => $total_cbm,
                            'done_pcs' => 0,
                            'done_cbm' => 0,
                            'shift' => $shift,
                        ]
                    );
                }
                break;
            default:
                    echo "Machine could not be found \n";
                break;
        }
        echo "Timer " . $machine . " filled with data until " . $finish ."\n";

    }
}
