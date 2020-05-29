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
    public function index()
    {
        $machines = Machine::all();

        return $machines;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($label)
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $machine = Machine::create([
            "name" => $request->name,
            "label" => $this->slugify($request->name),
            "max_norm1" => $request->max_norm1,
            "standard_norm1" => $request->standard_norm1,
            "min_norm1" => $request->min_norm1,
            "max_norm2" => $request->max_norm2,
            "standard_norm2" => $request->standard_norm2,
            "min_norm2" => $request->min_norm2,
            "working_hours" => $request->working_hours,
            "working_minutes" => ($request->working_hours*60)-$request->break_minutes,
            "tick_minutes" => $request->tick_minutes
        ]);

        return response()->json(['success' => 'success'], 200); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $machine = Machine::findOrFail($id);
        
        $machine->update([
            "name" => $request->name ?? $request->name ?? $machine->name ,
            "max_norm1" => $request->max_norm1 ?? $request->max_norm1 ?? $machine->max_norm1 ,
            "standard_norm1" => $request->standard_norm1 ?? $request->standard_norm1 ?? $machine->v ,
            "min_norm1" => $request->min_norm1 ?? $request->min_norm1 ?? $machine->min_norm1 ,
            "max_norm2" => $request->max_norm2 ?? $request->max_norm2 ?? $machine->max_norm2 ,
            "standard_norm2" => $request->standard_norm2 ?? $request->standard_norm2 ?? $machine->standard_norm2 ,
            "min_norm2" => $request->min_norm2 ?? $request->min_norm2 ?? $machine->min_norm2 ,
            "working_hours" => $request->working_hours ?? $request->working_hours ?? $machine->working_hours ,
            "working_minutes" => $request->working_minutes ?? $request->working_minutes ?? $machine->working_minutes,
            // "working_minutes" => $request->working_hours ?? ($request->working_hours*60)-$request->break_minutes ?? $machine->working_minutes ,
            "tick_minutes" => $request->tick_minutes ?? $request->name ?? $machine->tick_minutes,
            "workers_number" => $request->workers_number ?? $request->workers_number ?? $machine->workers_number,
        ]);

        return response()->json(['success' => 'success'], 200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $machine = Machine::findOrFail($id);
        
        $machine->delete();

        return response()->json(['success' => 'success'], 200);
    }

    public static function slugify($text)
    {
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

}
