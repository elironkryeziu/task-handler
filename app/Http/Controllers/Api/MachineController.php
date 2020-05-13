<?php

namespace App\Http\Controllers\Api;

use App\Machine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($label, Request $request)
    {
            $machine = Machine::where('label',$label)->first();
            if(!$machine)
            {
                return abort(404, "The Machine was not found");
            }else{
                return [
                    "name" => $machine->name,
                    "standard_norm_pcs" => $machine->standard_norm1,
                    "max_norm_pcs" => $machine->max_norm1,
                    "min_norm_pcs" => $machine->min_norm1,
                    "standard_norm_cbm" => $machine->standard_norm2,
                    "max_norm_cbm" => $machine->max_norm2,
                    "min_norm_cbm" => $machine->min_norm2,
                    "todo_minute_pcs" => round($machine->standard_norm1/$machine->working_minutes, 4),
                    "todo_minute_cbm" => round($machine->standard_norm2/$machine->working_minutes, 4),          
                ];
            }
    }
    
    
}
