<?php

namespace App\Http\Controllers\Api;

use App\Machine;
use App\TimerSaw;
use Carbon\Carbon;
use App\TimerAkron;
use App\TimerHomag;
use App\TimerPress;
use App\TimerSelco;
use App\TimerMontaz;
use App\TimerOkucia;
use App\TimerSkiper;
use App\TimerKartony;
use App\TimerPacking;
use App\TimerBiesseB1;
use App\TimerBiesseSb;
use App\TimerFrezarki;
use App\TimerBiesseFdt;
use App\TimerUkosiarki;
use Illuminate\Http\Request;
use App\TimerDolnowrzecionowki;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class TimerController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($label, Request $request)
    {
        $request->date ? $today = $request->date : $today = Carbon::today()->toDateString();

        switch ($label) {
            case 'selco':
                $timers = TimerSelco::whereDate('created_at', '=', $today)->orderBy('created_at', 'desc')->get();
            break;
            case 'akron':
                $timers = TimerAkron::whereDate('created_at', '=', $today)->orderBy('created_at', 'desc')->get();
            break;
            case 'biesse-b1':
                $timers = TimerBiesseB1::whereDate('created_at', '=', $today)->orderBy('created_at', 'desc')->get();
            break;
            case 'biesse-fdt':
                $timers = TimerBiesseFdt::whereDate('created_at', '=', $today)->orderBy('created_at', 'desc')->get();
            break;
            case 'biesse-sb':
                $timers = TimerBiesseSb::whereDate('created_at', '=', $today)->orderBy('created_at', 'desc')->get();
            break;
            case 'dolnowrzecionowki':
                $timers = TimerDolnowrzecionowki::whereDate('created_at', '=', $today)->orderBy('created_at', 'desc')->get();
            break;
            case 'frezarki':
                $timers = TimerFrezarki::whereDate('created_at', '=', $today)->orderBy('created_at', 'desc')->get();
            break;
            case 'homag':
                $timers = TimerHomag::whereDate('created_at', '=', $today)->orderBy('created_at', 'desc')->get();
            break;
            case 'kartony':
                $timers = TimerKartony::whereDate('created_at', '=', $today)->orderBy('created_at', 'desc')->get();
            break;
            case 'montaz':
                $timers = TimerMontaz::whereDate('created_at', '=', $today)->orderBy('created_at', 'desc')->get();
            break;
            case 'packing':
                $timers = TimerPacking::whereDate('created_at', '=', $today)->orderBy('created_at', 'desc')->get();
            break;
            case 'press':
                $timers = TimerPress::whereDate('created_at', '=', $today)->orderBy('created_at', 'desc')->get();
            break;
            case 'saw':
                $timers = TimerSaw::whereDate('created_at', '=', $today)->orderBy('created_at', 'desc')->get();
            break;
            case 'skiper':
                $timers = TimerSkiper::whereDate('created_at', '=', $today)->orderBy('created_at', 'desc')->get();
            break;
            case 'okucia':
                $timers = TimerOkucia::whereDate('created_at', '=', $today)->orderBy('created_at', 'desc')->get();
            break;
            case 'ukosiarki':
                $timers = TimerUkosiarki::whereDate('created_at', '=', $today)->orderBy('created_at', 'desc')->get();
            break;
            default:
                return abort(404, "The Machine was not found");
            break;
        }

        return [
            'timers' => $timers,
            'currentTimer' => $timers->first()
        ];

    }

    public function startTimer($label)
    {
        // Artisan::call('timers:fill '.$label);
        $machine = Machine::where('label', $label)->first();
        $todo_minute_pcs = $machine->standard_norm1/$machine->working_minutes;
        $todo_minute_cbm = $machine->standard_norm2/$machine->working_minutes;
        $tick_minutes = $machine->tick_minutes;
        $start_time = Carbon::now()->format('H:i:s');
        $tick_time = Carbon::now()->addMinutes($tick_minutes)->format('H:i:s');

        switch ($label) {
            case 'selco':
                $last = TimerSelco::orderBy('created_at','desc')->whereDate('created_at',Carbon::now()->toDateString())->first();
                if($last)
                {
                    $ttl_pcs = $last->to_do_pcs;
                    $ttl_cbm = $last->to_do_cbm;
                }else
                {
                    $ttl_pcs = 0;
                    $ttl_cbm = 0;
                }
                $timer = TimerSelco::create([
                    "start_time" => $start_time,
                    "tick_time" => $tick_time,
                    "to_do_pcs" => $ttl_pcs + $todo_minute_pcs*$tick_minutes,
                    "to_do_cbm" => $ttl_cbm + $todo_minute_cbm*$tick_minutes,
                ]);
            break;
            case 'akron':
                $last = TimerAkron::orderBy('created_at','desc')->whereDate('created_at',Carbon::now()->toDateString())->first();
                if($last)
                {
                    $ttl_pcs = $last->to_do_pcs;
                    $ttl_cbm = $last->to_do_cbm;
                }else
                {
                    $ttl_pcs = 0;
                    $ttl_cbm = 0;
                }
                $timer = TimerAkron::create([
                    "start_time" => $start_time,
                    "tick_time" => $tick_time,
                    "to_do_pcs" => $ttl_pcs + $todo_minute_pcs*$tick_minutes,
                    "to_do_cbm" => $ttl_cbm + $todo_minute_cbm*$tick_minutes,
                ]);
            break;
            case 'biesse-b1':
                $last = TimerBiesseB1::orderBy('created_at','desc')->whereDate('created_at',Carbon::now()->toDateString())->first();
                if($last)
                {
                    $ttl_pcs = $last->to_do_pcs;
                    $ttl_cbm = $last->to_do_cbm;
                }else
                {
                    $ttl_pcs = 0;
                    $ttl_cbm = 0;
                }
                $timer = TimerBiesseB1::create([
                    "start_time" => $start_time,
                    "tick_time" => $tick_time,
                    "to_do_pcs" => $ttl_pcs + $todo_minute_pcs*$tick_minutes,
                    "to_do_cbm" => $ttl_cbm + $todo_minute_cbm*$tick_minutes,
                ]);
            break;
            case 'biesse-fdt':
                $last = TimerBiesseFdt::orderBy('created_at','desc')->whereDate('created_at',Carbon::now()->toDateString())->first();
                if($last)
                {
                    $ttl_pcs = $last->to_do_pcs;
                    $ttl_cbm = $last->to_do_cbm;
                }else
                {
                    $ttl_pcs = 0;
                    $ttl_cbm = 0;
                }
                $timer = TimerBiesseFdt::create([
                    "start_time" => $start_time,
                    "tick_time" => $tick_time,
                    "to_do_pcs" => $ttl_pcs + $todo_minute_pcs*$tick_minutes,
                    "to_do_cbm" => $ttl_cbm + $todo_minute_cbm*$tick_minutes,
                ]);
            break;
            case 'biesse-sb':
                $last = TimerBiesseSb::orderBy('created_at','desc')->whereDate('created_at',Carbon::now()->toDateString())->first();
                if($last)
                {
                    $ttl_pcs = $last->to_do_pcs;
                    $ttl_cbm = $last->to_do_cbm;
                }else
                {
                    $ttl_pcs = 0;
                    $ttl_cbm = 0;
                }
                $timer = TimerBiesseSb::create([
                    "start_time" => $start_time,
                    "tick_time" => $tick_time,
                    "to_do_pcs" => $ttl_pcs + $todo_minute_pcs*$tick_minutes,
                    "to_do_cbm" => $ttl_cbm + $todo_minute_cbm*$tick_minutes,
                ]);
            break;
            case 'dolnowrzecionowki':
                $last = TimerDolnowrzecionowki::orderBy('created_at','desc')->whereDate('created_at',Carbon::now()->toDateString())->first();
                if($last)
                {
                    $ttl_pcs = $last->to_do_pcs;
                    $ttl_cbm = $last->to_do_cbm;
                }else
                {
                    $ttl_pcs = 0;
                    $ttl_cbm = 0;
                }
                $timer = TimerDolnowrzecionowki::create([
                    "start_time" => $start_time,
                    "tick_time" => $tick_time,
                    "to_do_pcs" => $ttl_pcs + $todo_minute_pcs*$tick_minutes,
                    "to_do_cbm" => $ttl_cbm + $todo_minute_cbm*$tick_minutes,
                ]);
            break;
            case 'frezarki':
                $last = TimerFrezarki::orderBy('created_at','desc')->whereDate('created_at',Carbon::now()->toDateString())->first();
                if($last)
                {
                    $ttl_pcs = $last->to_do_pcs;
                    $ttl_cbm = $last->to_do_cbm;
                }else
                {
                    $ttl_pcs = 0;
                    $ttl_cbm = 0;
                }
                $timer = TimerFrezarki::create([
                    "start_time" => $start_time,
                    "tick_time" => $tick_time,
                    "to_do_pcs" => $ttl_pcs + $todo_minute_pcs*$tick_minutes,
                    "to_do_cbm" => $ttl_cbm + $todo_minute_cbm*$tick_minutes,
                ]);
            break;
            case 'homag':
                $last = TimerHomag::orderBy('created_at','desc')->whereDate('created_at',Carbon::now()->toDateString())->first();
                if($last)
                {
                    $ttl_pcs = $last->to_do_pcs;
                    $ttl_cbm = $last->to_do_cbm;
                }else
                {
                    $ttl_pcs = 0;
                    $ttl_cbm = 0;
                }
                $timer = TimerHomag::create([
                    "start_time" => $start_time,
                    "tick_time" => $tick_time,
                    "to_do_pcs" => $ttl_pcs + $todo_minute_pcs*$tick_minutes,
                    "to_do_cbm" => $ttl_cbm + $todo_minute_cbm*$tick_minutes,
                ]);
            break;
            case 'kartony':
                $last = TimerKartony::orderBy('created_at','desc')->whereDate('created_at',Carbon::now()->toDateString())->first();
                if($last)
                {
                    $ttl_pcs = $last->to_do_pcs;
                    $ttl_cbm = $last->to_do_cbm;
                }else
                {
                    $ttl_pcs = 0;
                    $ttl_cbm = 0;
                }
                $timer = TimerKartony::create([
                    "start_time" => $start_time,
                    "tick_time" => $tick_time,
                    "to_do_pcs" => $ttl_pcs + $todo_minute_pcs*$tick_minutes,
                    "to_do_cbm" => $ttl_cbm + $todo_minute_cbm*$tick_minutes,
                ]);
            break;
            case 'montaz':
                $last = TimerMontaz::orderBy('created_at','desc')->whereDate('created_at',Carbon::now()->toDateString())->first();
                if($last)
                {
                    $ttl_pcs = $last->to_do_pcs;
                    $ttl_cbm = $last->to_do_cbm;
                }else
                {
                    $ttl_pcs = 0;
                    $ttl_cbm = 0;
                }
                $timer = TimerMontaz::create([
                    "start_time" => $start_time,
                    "tick_time" => $tick_time,
                    "to_do_pcs" => $ttl_pcs + $todo_minute_pcs*$tick_minutes,
                    "to_do_cbm" => $ttl_cbm + $todo_minute_cbm*$tick_minutes,
                ]);
            break;
            case 'packing':
                $last = TimerPacking::orderBy('created_at','desc')->whereDate('created_at',Carbon::now()->toDateString())->first();
                if($last)
                {
                    $ttl_pcs = $last->to_do_pcs;
                    $ttl_cbm = $last->to_do_cbm;
                }else
                {
                    $ttl_pcs = 0;
                    $ttl_cbm = 0;
                }
                $timer = TimerPacking::create([
                    "start_time" => $start_time,
                    "tick_time" => $tick_time,
                    "to_do_pcs" => $ttl_pcs + $todo_minute_pcs*$tick_minutes,
                    "to_do_cbm" => $ttl_cbm + $todo_minute_cbm*$tick_minutes,
                ]);
            break;
            case 'press':
                $last = TimerPress::orderBy('created_at','desc')->whereDate('created_at',Carbon::now()->toDateString())->first();
                if($last)
                {
                    $ttl_pcs = $last->to_do_pcs;
                    $ttl_cbm = $last->to_do_cbm;
                }else
                {
                    $ttl_pcs = 0;
                    $ttl_cbm = 0;
                }
                $timer = TimerPress::create([
                    "start_time" => $start_time,
                    "tick_time" => $tick_time,
                    "to_do_pcs" => $ttl_pcs + $todo_minute_pcs*$tick_minutes,
                    "to_do_cbm" => $ttl_cbm + $todo_minute_cbm*$tick_minutes,
                ]);
            break;
            case 'saw':
                $last = TimerSaw::orderBy('created_at','desc')->whereDate('created_at',Carbon::now()->toDateString())->first();
                if($last)
                {
                    $ttl_pcs = $last->to_do_pcs;
                    $ttl_cbm = $last->to_do_cbm;
                }else
                {
                    $ttl_pcs = 0;
                    $ttl_cbm = 0;
                }
                $timer = TimerSaw::create([
                    "start_time" => $start_time,
                    "tick_time" => $tick_time,
                    "to_do_pcs" => $ttl_pcs + $todo_minute_pcs*$tick_minutes,
                    "to_do_cbm" => $ttl_cbm + $todo_minute_cbm*$tick_minutes,
                ]);
            break;
            case 'skiper':
                $last = TimerSkiper::orderBy('created_at','desc')->whereDate('created_at',Carbon::now()->toDateString())->first();
                if($last)
                {
                    $ttl_pcs = $last->to_do_pcs;
                    $ttl_cbm = $last->to_do_cbm;
                }else
                {
                    $ttl_pcs = 0;
                    $ttl_cbm = 0;
                }
                $timer = TimerSkiper::create([
                    "start_time" => $start_time,
                    "tick_time" => $tick_time,
                    "to_do_pcs" => $ttl_pcs + $todo_minute_pcs*$tick_minutes,
                    "to_do_cbm" => $ttl_cbm + $todo_minute_cbm*$tick_minutes,
                ]);
            break;
            case 'okucia':
                $last = TimerOkucia::orderBy('created_at','desc')->whereDate('created_at',Carbon::now()->toDateString())->first();
                if($last)
                {
                    $ttl_pcs = $last->to_do_pcs;
                    $ttl_cbm = $last->to_do_cbm;
                }else
                {
                    $ttl_pcs = 0;
                    $ttl_cbm = 0;
                }
                $timer = TimerOkucia::create([
                    "start_time" => $start_time,
                    "tick_time" => $tick_time,
                    "to_do_pcs" => $ttl_pcs + $todo_minute_pcs*$tick_minutes,
                    "to_do_cbm" => $ttl_cbm + $todo_minute_cbm*$tick_minutes,
                ]);
            break;
            case 'ukosiarki':
                $last = TimerUkosiarki::orderBy('created_at','desc')->whereDate('created_at',Carbon::now()->toDateString())->first();
                if($last)
                {
                    $ttl_pcs = $last->to_do_pcs;
                    $ttl_cbm = $last->to_do_cbm;
                }else
                {
                    $ttl_pcs = 0;
                    $ttl_cbm = 0;
                }
                $timer = TimerUkosiarki::create([
                    "start_time" => $start_time,
                    "tick_time" => $tick_time,
                    "to_do_pcs" => $ttl_pcs + $todo_minute_pcs*$tick_minutes,
                    "to_do_cbm" => $ttl_cbm + $todo_minute_cbm*$tick_minutes,
                ]);
            break;
            default:
                return abort(404, "The Machine was not found");
            break;
        }

    }

    public function stopTimer($label, Request $request)
    {
        $machine = Machine::where('label', $label)->first();
        $todo_minute_pcs = $machine->standard_norm1/$machine->working_minutes;
        $todo_minute_cbm = $machine->standard_norm2/$machine->working_minutes;
        $now = Carbon::now()->format('H:i:s');

        switch ($label) {
            case 'selco':
                $timer = TimerSelco::whereDate('created_at','=',Carbon::now()->toDateString())
                                    ->where('start_time','<',$now)
                                    ->where('tick_time','>',$now)
                                    ->first();
                $timer->tick_time = $now;
                $start_time = new Carbon($timer->start_time);
                $diff = Carbon::now()->diffInMinutes($start_time);
                $timer->to_do_pcs = $timer->to_do_pcs - ($todo_minute_pcs*$machine->tick_minutes);
                $timer->to_do_pcs = $timer->to_do_pcs + ($todo_minute_pcs*$diff);
                $timer->to_do_cbm = $timer->to_do_cbm - ($todo_minute_cbm*$machine->tick_minutes);
                $timer->to_do_cbm = $timer->to_do_cbm + ($todo_minute_cbm*$diff);
                $timer->save();
            break;
            case 'akron':
                $timer = TimerAkron::whereDate('created_at','=',Carbon::now()->toDateString())
                                    ->where('start_time','<',$now)
                                    ->where('tick_time','>',$now)
                                    ->first();
                $timer->tick_time = $now;
                $start_time = new Carbon($timer->start_time);
                $diff = Carbon::now()->diffInMinutes($start_time);
                $timer->to_do_pcs = $timer->to_do_pcs - ($todo_minute_pcs*$machine->tick_minutes);
                $timer->to_do_pcs = $timer->to_do_pcs + ($todo_minute_pcs*$diff);
                $timer->to_do_cbm = $timer->to_do_cbm - ($todo_minute_cbm*$machine->tick_minutes);
                $timer->to_do_cbm = $timer->to_do_cbm + ($todo_minute_cbm*$diff);
                $timer->save();
            break;
            case 'biesse-b1':
                $timer = TimerBiesseB1::whereDate('created_at','=',Carbon::now()->toDateString())
                                ->where('start_time','<',$now)
                                ->where('tick_time','>',$now)
                                ->first();
                $timer->tick_time = $now;
                $start_time = new Carbon($timer->start_time);
                $diff = Carbon::now()->diffInMinutes($start_time);
                $timer->to_do_pcs = $timer->to_do_pcs - ($todo_minute_pcs*$machine->tick_minutes);
                $timer->to_do_pcs = $timer->to_do_pcs + ($todo_minute_pcs*$diff);
                $timer->to_do_cbm = $timer->to_do_cbm - ($todo_minute_cbm*$machine->tick_minutes);
                $timer->to_do_cbm = $timer->to_do_cbm + ($todo_minute_cbm*$diff);
                $timer->save();
            break;
            case 'biesse-fdt':
                $timer = TimerBiesseFdt::whereDate('created_at','=',Carbon::now()->toDateString())
                                ->where('start_time','<',$now)
                                ->where('tick_time','>',$now)
                                ->first();
                $timer->tick_time = $now;
                $start_time = new Carbon($timer->start_time);
                $diff = Carbon::now()->diffInMinutes($start_time);
                $timer->to_do_pcs = $timer->to_do_pcs - ($todo_minute_pcs*$machine->tick_minutes);
                $timer->to_do_pcs = $timer->to_do_pcs + ($todo_minute_pcs*$diff);
                $timer->to_do_cbm = $timer->to_do_cbm - ($todo_minute_cbm*$machine->tick_minutes);
                $timer->to_do_cbm = $timer->to_do_cbm + ($todo_minute_cbm*$diff);
                $timer->save();
            break;
            case 'biesse-sb':
                $timer = TimerBiesseSb::whereDate('created_at','=',Carbon::now()->toDateString())
                                ->where('start_time','<',$now)
                                ->where('tick_time','>',$now)
                                ->first();
                $timer->tick_time = $now;
                $start_time = new Carbon($timer->start_time);
                $diff = Carbon::now()->diffInMinutes($start_time);
                $timer->to_do_pcs = $timer->to_do_pcs - ($todo_minute_pcs*$machine->tick_minutes);
                $timer->to_do_pcs = $timer->to_do_pcs + ($todo_minute_pcs*$diff);
                $timer->to_do_cbm = $timer->to_do_cbm - ($todo_minute_cbm*$machine->tick_minutes);
                $timer->to_do_cbm = $timer->to_do_cbm + ($todo_minute_cbm*$diff);
                $timer->save();
            break;
            case 'dolnowrzecionowki':
                $timer = TimerDolnowrzecionowki::whereDate('created_at','=',Carbon::now()->toDateString())
                                ->where('start_time','<',$now)
                                ->where('tick_time','>',$now)
                                ->first();
                $timer->tick_time = $now;
                $start_time = new Carbon($timer->start_time);
                $diff = Carbon::now()->diffInMinutes($start_time);
                $timer->to_do_pcs = $timer->to_do_pcs - ($todo_minute_pcs*$machine->tick_minutes);
                $timer->to_do_pcs = $timer->to_do_pcs + ($todo_minute_pcs*$diff);
                $timer->to_do_cbm = $timer->to_do_cbm - ($todo_minute_cbm*$machine->tick_minutes);
                $timer->to_do_cbm = $timer->to_do_cbm + ($todo_minute_cbm*$diff);
                $timer->save();
            break;
            case 'frezarki':
                $timer = TimerFrezarki::whereDate('created_at','=',Carbon::now()->toDateString())
                                ->where('start_time','<',$now)
                                ->where('tick_time','>',$now)
                                ->first();
                $timer->tick_time = $now;
                $start_time = new Carbon($timer->start_time);
                $diff = Carbon::now()->diffInMinutes($start_time);
                $timer->to_do_pcs = $timer->to_do_pcs - ($todo_minute_pcs*$machine->tick_minutes);
                $timer->to_do_pcs = $timer->to_do_pcs + ($todo_minute_pcs*$diff);
                $timer->to_do_cbm = $timer->to_do_cbm - ($todo_minute_cbm*$machine->tick_minutes);
                $timer->to_do_cbm = $timer->to_do_cbm + ($todo_minute_cbm*$diff);
                $timer->save();
            break;
            case 'homag':
                $timer = TimerHomag::whereDate('created_at','=',Carbon::now()->toDateString())
                                ->where('start_time','<',$now)
                                ->where('tick_time','>',$now)
                                ->first();
                $timer->tick_time = $now;
                $start_time = new Carbon($timer->start_time);
                $diff = Carbon::now()->diffInMinutes($start_time);
                $timer->to_do_pcs = $timer->to_do_pcs - ($todo_minute_pcs*$machine->tick_minutes);
                $timer->to_do_pcs = $timer->to_do_pcs + ($todo_minute_pcs*$diff);
                $timer->to_do_cbm = $timer->to_do_cbm - ($todo_minute_cbm*$machine->tick_minutes);
                $timer->to_do_cbm = $timer->to_do_cbm + ($todo_minute_cbm*$diff);
                $timer->save();
            break;
            case 'kartony':
                $timer = TimerKartony::whereDate('created_at','=',Carbon::now()->toDateString())
                                ->where('start_time','<',$now)
                                ->where('tick_time','>',$now)
                                ->first();
                $timer->tick_time = $now;
                $start_time = new Carbon($timer->start_time);
                $diff = Carbon::now()->diffInMinutes($start_time);
                $timer->to_do_pcs = $timer->to_do_pcs - ($todo_minute_pcs*$machine->tick_minutes);
                $timer->to_do_pcs = $timer->to_do_pcs + ($todo_minute_pcs*$diff);
                $timer->to_do_cbm = $timer->to_do_cbm - ($todo_minute_cbm*$machine->tick_minutes);
                $timer->to_do_cbm = $timer->to_do_cbm + ($todo_minute_cbm*$diff);
                $timer->save();
            break;
            case 'montaz':
                $timer = TimerMontaz::whereDate('created_at','=',Carbon::now()->toDateString())
                                ->where('start_time','<',$now)
                                ->where('tick_time','>',$now)
                                ->first();
                $timer->tick_time = $now;
                $start_time = new Carbon($timer->start_time);
                $diff = Carbon::now()->diffInMinutes($start_time);
                $timer->to_do_pcs = $timer->to_do_pcs - ($todo_minute_pcs*$machine->tick_minutes);
                $timer->to_do_pcs = $timer->to_do_pcs + ($todo_minute_pcs*$diff);
                $timer->to_do_cbm = $timer->to_do_cbm - ($todo_minute_cbm*$machine->tick_minutes);
                $timer->to_do_cbm = $timer->to_do_cbm + ($todo_minute_cbm*$diff);
                $timer->save();
            break;
            case 'packing':
                $timer = TimerPacking::whereDate('created_at','=',Carbon::now()->toDateString())
                                ->where('start_time','<',$now)
                                ->where('tick_time','>',$now)
                                ->first();
                $timer->tick_time = $now;
                $start_time = new Carbon($timer->start_time);
                $diff = Carbon::now()->diffInMinutes($start_time);
                $timer->to_do_pcs = $timer->to_do_pcs - ($todo_minute_pcs*$machine->tick_minutes);
                $timer->to_do_pcs = $timer->to_do_pcs + ($todo_minute_pcs*$diff);
                $timer->to_do_cbm = $timer->to_do_cbm - ($todo_minute_cbm*$machine->tick_minutes);
                $timer->to_do_cbm = $timer->to_do_cbm + ($todo_minute_cbm*$diff);
                $timer->save();
            break;
            case 'press':
                $timer = TimerPress::whereDate('created_at','=',Carbon::now()->toDateString())
                                ->where('start_time','<',$now)
                                ->where('tick_time','>',$now)
                                ->first();
                $timer->tick_time = $now;
                $start_time = new Carbon($timer->start_time);
                $diff = Carbon::now()->diffInMinutes($start_time);
                $timer->to_do_pcs = $timer->to_do_pcs - ($todo_minute_pcs*$machine->tick_minutes);
                $timer->to_do_pcs = $timer->to_do_pcs + ($todo_minute_pcs*$diff);
                $timer->to_do_cbm = $timer->to_do_cbm - ($todo_minute_cbm*$machine->tick_minutes);
                $timer->to_do_cbm = $timer->to_do_cbm + ($todo_minute_cbm*$diff);
                $timer->save();
            break;
            case 'saw':
                $timer = TimerSaw::whereDate('created_at','=',Carbon::now()->toDateString())
                                ->where('start_time','<',$now)
                                ->where('tick_time','>',$now)
                                ->first();
                $timer->tick_time = $now;
                $start_time = new Carbon($timer->start_time);
                $diff = Carbon::now()->diffInMinutes($start_time);
                $timer->to_do_pcs = $timer->to_do_pcs - ($todo_minute_pcs*$machine->tick_minutes);
                $timer->to_do_pcs = $timer->to_do_pcs + ($todo_minute_pcs*$diff);
                $timer->to_do_cbm = $timer->to_do_cbm - ($todo_minute_cbm*$machine->tick_minutes);
                $timer->to_do_cbm = $timer->to_do_cbm + ($todo_minute_cbm*$diff);
                $timer->save();
            break;
            case 'skiper':
                $timer = TimerSkiper::whereDate('created_at','=',Carbon::now()->toDateString())
                                ->where('start_time','<',$now)
                                ->where('tick_time','>',$now)
                                ->first();
                $timer->tick_time = $now;
                $start_time = new Carbon($timer->start_time);
                $diff = Carbon::now()->diffInMinutes($start_time);
                $timer->to_do_pcs = $timer->to_do_pcs - ($todo_minute_pcs*$machine->tick_minutes);
                $timer->to_do_pcs = $timer->to_do_pcs + ($todo_minute_pcs*$diff);
                $timer->to_do_cbm = $timer->to_do_cbm - ($todo_minute_cbm*$machine->tick_minutes);
                $timer->to_do_cbm = $timer->to_do_cbm + ($todo_minute_cbm*$diff);
                $timer->save();
            break;
            case 'okucia':
                $timer = TimerOkucia::whereDate('created_at','=',Carbon::now()->toDateString())
                                ->where('start_time','<',$now)
                                ->where('tick_time','>',$now)
                                ->first();
                $timer->tick_time = $now;
                $start_time = new Carbon($timer->start_time);
                $diff = Carbon::now()->diffInMinutes($start_time);
                $timer->to_do_pcs = $timer->to_do_pcs - ($todo_minute_pcs*$machine->tick_minutes);
                $timer->to_do_pcs = $timer->to_do_pcs + ($todo_minute_pcs*$diff);
                $timer->to_do_cbm = $timer->to_do_cbm - ($todo_minute_cbm*$machine->tick_minutes);
                $timer->to_do_cbm = $timer->to_do_cbm + ($todo_minute_cbm*$diff);
                $timer->save();
            break;
            case 'ukosiarki':
                $timer = TimerUkosiarki::whereDate('created_at','=',Carbon::now()->toDateString())
                                ->where('start_time','<',$now)
                                ->where('tick_time','>',$now)
                                ->first();
                $timer->tick_time = $now;
                $start_time = new Carbon($timer->start_time);
                $diff = Carbon::now()->diffInMinutes($start_time);
                $timer->to_do_pcs = $timer->to_do_pcs - ($todo_minute_pcs*$machine->tick_minutes);
                $timer->to_do_pcs = $timer->to_do_pcs + ($todo_minute_pcs*$diff);
                $timer->to_do_cbm = $timer->to_do_cbm - ($todo_minute_cbm*$machine->tick_minutes);
                $timer->to_do_cbm = $timer->to_do_cbm + ($todo_minute_cbm*$diff);
                $timer->save();
            break;
            default:
                return abort(404, "The Machine was not found");
            break;
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$label, $id)
    {
        switch ($label) {
            case 'selco':
                $timer = TimerSelco::find($id);
            break;
            case 'akron':
                $timer = TimerAkron::find($id);
            break;
            case 'biesse-b1':
                $timer = TimerBiesseB1::find($id);
            break;
            case 'biesse-fdt':
                $timer = TimerBiesseFdt::find($id);
            break;
            case 'biesse-sb':
                $timer = TimerBiesseSb::find($id);
            break;
            case 'dolnowrzecionowki':
                $timer = TimerDolnowrzecionowki::find($id);
            break;
            case 'frezarki':
                $timer = TimerFrezarki::find($id);
            break;
            case 'homag':
                $timer = TimerHomag::find($id);
            break;
            case 'kartony':
                $timer = TimerKartony::find($id);
            break;
            case 'montaz':
                $timer = TimerMontaz::find($id);
            break;
            case 'packing':
                $timer = TimerPacking::find($id);
            break;
            case 'press':
                $timer = TimerPress::find($id);
            break;
            case 'saw':
                $timer = TimerSaw::find($id);
            break;
            case 'skiper':
                $timer = TimerSkiper::find($id);
            break;
            case 'okucia':
                $timer = TimerOkucia::find($id);
            break;
            case 'ukosiarki':
                $timer = TimerUkosiarki::find($id);
            break;
            default:
                return abort(404, "The Machine was not found");
            break;
        }

        $timer->done_pcs = $request->done_pcs;
        $timer->done_cbm = $request->done_cbm;
        $timer->save();
        
        return response()->json(['success' => 'success'], 200); 
    }
}
