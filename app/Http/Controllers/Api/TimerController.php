<?php

namespace App\Http\Controllers\Api;

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
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TimerController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($label, Request $request)
    {
        $time = Carbon::now()->format('H:i');
        $previousTimers = array();
        $currentTimer = 0;
        
        $today = Carbon::today()->toDateString();
        switch ($label) {
            case 'selco':
                $timer = TimerSelco::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done','shift']);
            break;
            case 'akron':
                $timer = TimerAkron::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done','shift']);
            break;
            case 'biesse-b1':
                $timer = TimerBiesseB1::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done','shift']);
            break;
            case 'biesse-fdt':
                $timer = TimerBiesseFdt::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done','shift']);
            break;
            case 'biesse-sb':
                $timer = TimerBiesseSb::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done','shift']);
            break;
            case 'dolnowrzecionowki':
                $timer = TimerDolnowrzecionowki::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done','shift']);
            break;
            case 'frezarki':
                $timer = TimerFrezarki::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done','shift']);
            break;
            case 'homag':
                $timer = TimerHomag::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done','shift']);
            break;
            case 'kartony':
                $timer = TimerKartony::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done','shift']);
            break;
            case 'montaz':
                $timer = TimerMontaz::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done','shift']);
            break;
            case 'packing':
                $timer = TimerPacking::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done','shift']);
            break;
            case 'press':
                $timer = TimerPress::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done','shift']);
            break;
            case 'saw':
                $timer = TimerSaw::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done','shift']);
            break;
            case 'skiper':
                $timer = TimerSkiper::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done','shift']);
            break;
            case 'ukocia':
                $timer = TimerUkocia::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done','shift']);
            break;
            case 'ukosiarki':
                $timer = TimerUkosiarki::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done','shift']);
            break;
            default:
                return abort(404, "The Machine was not found");
            break;
        }

        foreach ($timer as $t)
        {
            if($t->tick_time < $time)
            {
                array_push($previousTimers , $t);
            }
            if($t->start_time < $time && $t->tick_time > $time)
            {
                $currentTimer = $t;
            }
        }

        return [
            'previous_timers' => $previousTimers,
            'current_timer' => $currentTimer
        ];
    }
}
