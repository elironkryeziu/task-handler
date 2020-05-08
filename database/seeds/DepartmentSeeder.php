<?php

use Carbon\Carbon;
use App\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        

        $departments = array(
            ['number' => 'F8',
            'name' => 'Cutting',
            'shift_1_start' => '06:00:00',
            'break_1_start' => '09:45:00',
            'break_1_end' => '10:00:00',
            'shift_1_end' => '12:24:00',
            'shift_2_start' => '12:24:00',
            'shift_2_end' => '18:48:00',
            'created_at' => Carbon::now()],
            ['number' => 'F1',
            'name' => 'Wstepna',
            'shift_1_start' => '06:00:00',
            'break_1_start' => '09:45:00',
            'break_1_end' => '10:00:00',
            'shift_1_end' => '12:24:00',
            'shift_2_start' => '12:24:00',
            'shift_2_end' => '18:48:00',
            'created_at' => Carbon::now()],
            ['number' => 'F2',
            'name' => 'Machinery',
            'shift_1_start' => '06:00:00',
            'break_1_start' => '10:00:00',
            'break_1_end' => '10:15:00',
            'shift_1_end' => '12:24:00',
            'shift_2_start' => '12:24:00',
            'shift_2_end' => '18:48:00',
            'created_at' => Carbon::now()],
            ['number' => 'F5',
            'name' => 'Fittings',
            'shift_1_start' => '06:00:00',
            'break_1_start' => '10:00:00',
            'break_1_end' => '10:15:00',
            'shift_1_end' => '15:00:00',
            'created_at' => Carbon::now()],
            ['number' => 'F7',
            'name' => 'Cartons',
            'shift_1_start' => '06:00:00',
            'break_1_start' => '10:00:00',
            'break_1_end' => '10:15:00',
            'shift_1_end' => '12:24:00',
            'shift_2_start' => '12:24:00',
            'shift_2_end' => '18:48:00',
            'created_at' => Carbon::now()],
            ['name' => 'Premontage',
            'shift_1_start' => '06:00:00',
            'break_1_start' => '10:00:00',
            'break_1_end' => '10:15:00',
            'shift_1_end' => '15:00:00',
            'created_at' => Carbon::now()],
            ['name' => 'Packing Line',
            'shift_1_start' => '07:00:00',
            'break_1_start' => '11:00:00',
            'break_1_end' => '11:15:00',
            'shift_1_end' => '15:00:00',
            'created_at' => Carbon::now()],
            ['name' => 'Cleaning QC',
            'shift_1_start' => '06:00:00',
            'break_1_start' => '11:00:00',
            'break_1_end' => '11:15:00',
            'shift_1_end' => '15:00:00',
            'created_at' => Carbon::now()],
            ['name' => 'Office',
            'shift_1_start' => '08:00:00',
            'break_1_start' => '11:00:00',
            'break_1_end' => '11:15:00',
            'shift_1_end' => '14:24:00',
            'created_at' => Carbon::now()]);

        foreach($departments as $department){
            DB::table('departments')->insert($department);

        }
    }
}
