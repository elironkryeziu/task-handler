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
use App\TimerOkucia;
use App\TimerKartony;
use App\TimerPacking;
use App\TimerBiesseB1;
use App\TimerBiesseSb;
use App\TimerFrezarki;
use App\TimerBiesseFdt;
use App\TimerUkosiarki;
use Illuminate\Http\Request;
use App\TimerDolnowrzecionowki;
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
        $time = Carbon::now()->format('H:i');
        $previousTimers = array();
        $currentTimer = 0;
        $started = false;
        
        if($request->date)
        {
            $today = $request->date;
        }else{
            $today = Carbon::today()->toDateString();
        }
        switch ($label) {
            case 'selco':
                $timer = TimerSelco::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done_pcs','done_cbm','shift']);
            break;
            case 'akron':
                $timer = TimerAkron::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done_pcs','done_cbm','shift']);
            break;
            case 'biesse-b1':
                $timer = TimerBiesseB1::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done_pcs','done_cbm','shift']);
            break;
            case 'biesse-fdt':
                $timer = TimerBiesseFdt::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done_pcs','done_cbm','shift']);
            break;
            case 'biesse-sb':
                $timer = TimerBiesseSb::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done_pcs','done_cbm','shift']);
            break;
            case 'dolnowrzecionowki':
                $timer = TimerDolnowrzecionowki::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done_pcs','done_cbm','shift']);
            break;
            case 'frezarki':
                $timer = TimerFrezarki::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done_pcs','done_cbm','shift']);
            break;
            case 'homag':
                $timer = TimerHomag::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done_pcs','done_cbm','shift']);
            break;
            case 'kartony':
                $timer = TimerKartony::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done_pcs','done_cbm','shift']);
            break;
            case 'montaz':
                $timer = TimerMontaz::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done_pcs','done_cbm','shift']);
            break;
            case 'packing':
                $timer = TimerPacking::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done_pcs','done_cbm','shift']);
            break;
            case 'press':
                $timer = TimerPress::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done_pcs','done_cbm','shift']);
            break;
            case 'saw':
                $timer = TimerSaw::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done_pcs','done_cbm','shift']);
            break;
            case 'skiper':
                $timer = TimerSkiper::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done_pcs','done_cbm','shift']);
            break;
            case 'okucia':
                $timer = TimerOkucia::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done_pcs','done_cbm','shift']);
            break;
            case 'ukosiarki':
                $timer = TimerUkosiarki::whereDate('created_at', '=', $today)
                            ->orderBy('id', 'desc')
                            ->get(['start_time','tick_time','to_do_pcs','to_do_cbm','done_pcs','done_cbm','shift']);
            break;
            default:
                return abort(404, "The Machine was not found");
            break;
        }

        if($request->date)
        {
            return $timer;
        }else
        {
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
            
            if(!empty($previousTimers) || $currentTimer != 0)
            {
                $started = true;
            }
            
            return [
                'previous_timers' => $previousTimers,
                'current_timer' => $currentTimer,
                'started' => $started
            ];
        }
    }

    public function fillTimer($label)
    {
        Artisan::call('timers:fill '.$label);
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
