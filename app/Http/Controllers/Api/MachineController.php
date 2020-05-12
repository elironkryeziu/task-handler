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
                    "norm1" => $machine->norm1,
                ];
            }
    }
    
    
}
