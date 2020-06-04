<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MachineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $machines = array(
            [
                'name' => 'SELCO',
                'label' => 'selco',
                'max_norm1' => 1200,
                'standard_norm1' => 1000,
                'min_norm1' => 800,
                'unit1' => 'PCS',
                'max_norm2' => 34.5,
                'standard_norm2' => 33,
                'min_norm2' => 31.5,
                'unit2' => 'CBM',
                'working_hours' => 8,
                'working_minutes' => 465,
                'break_time' => 15,
                'tick_minutes' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'PRESS',
                'label' => 'press',
                'max_norm1' => 1000,
                'standard_norm1' => 800,
                'min_norm1' => 600,
                'unit1' => 'PCS',
                'max_norm2' => 3600,
                'standard_norm2' => 3450,
                'min_norm2' => 3300,
                'unit2' => 'CBM',
               'working_hours' => 8,
                'working_minutes' => 465,
                'break_time' => 15,
                'tick_minutes' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'BIESSE SB',
                'label' => 'biesse-sb',
                'max_norm1' => 1500,
                'standard_norm1' => 1200,
                'min_norm1' => 900,
                'unit1' => 'PCS',
                'max_norm2' => 4000,
                'standard_norm2' => 3800,
                'min_norm2' => 3600,
                'unit2' => 'CBM',
               'working_hours' => 8,
                'working_minutes' => 465,
                'break_time' => 15,
                'tick_minutes' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'BIESSE B1',
                'label' => 'biesse-b1',
                'max_norm1' => 1000,
                'standard_norm1' => 800,
                'min_norm1' => 600,
                'unit1' => 'PCS',
                'max_norm2' => 4400,
                'standard_norm2' => 4300,
                'min_norm2' => 4200,
                'unit2' => 'CBM',
               'working_hours' => 8,
                'working_minutes' => 465,
                'break_time' => 15,
                'tick_minutes' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'AKRON',
                'label' => 'akron',
                'max_norm1' => 1000,
                'standard_norm1' => 800,
                'min_norm1' => 600,
                'unit1' => 'PCS',
                'max_norm2' => 2200,
                'standard_norm2' => 2150,
                'min_norm2' => 2100,
                'unit2' => 'CBM',
               'working_hours' => 8,
                'working_minutes' => 465,
                'break_time' => 15,
                'tick_minutes' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'SKIPER',
                'label' => 'skiper',
                'max_norm1' => 1000,
                'standard_norm1' => 800,
                'min_norm1' => 600,
                'unit1' => 'PCS',
                'max_norm2' => 2400,
                'standard_norm2' => 2200,
                'min_norm2' => 2000,
                'unit2' => 'CBM',
               'working_hours' => 8,
                'working_minutes' => 465,
                'break_time' => 15,
                'tick_minutes' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'BIESSE FDT',
                'label' => 'biesse-fdt',
                'max_norm1' => 1200,
                'standard_norm1' => 1000,
                'min_norm1' => 800,
                'unit1' => 'PCS',
                'max_norm2' => 13650,
                'standard_norm2' => 4050,
                'min_norm2' => 3900,
                'unit2' => 'CBM',
               'working_hours' => 8,
                'working_minutes' => 465,
                'break_time' => 15,
                'tick_minutes' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'SAW',
                'label' => 'saw',
                'max_norm1' => 600,
                'standard_norm1' => 500,
                'min_norm1' => 400,
                'unit1' => 'PCS',
                'max_norm2' => 5600,
                'standard_norm2' => 5500,
                'min_norm2' => 5400,
                'unit2' => 'CBM',
               'working_hours' => 8,
                'working_minutes' => 465,
                'break_time' => 15,
                'tick_minutes' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'FREZARKI',
                'label' => 'frezarki',
                'max_norm1' => 600,
                'standard_norm1' => 500,
                'min_norm1' => 400,
                'unit1' => 'PCS',
                'max_norm2' => 2950,
                'standard_norm2' => 2800,
                'min_norm2' => 2650,
                'unit2' => 'CBM',
               'working_hours' => 8,
                'working_minutes' => 465,
                'break_time' => 15,
                'tick_minutes' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'DOLNOWRZECIONÓWKI SMALL DRILL',
                'label' => 'dolnowrzecionowki',
                'max_norm1' => 600,
                'standard_norm1' => 500,
                'min_norm1' => 400,
                'unit1' => 'PCS',
                'max_norm2' => 2400,
                'standard_norm2' => 2300,
                'min_norm2' => 2200,
                'unit2' => 'CBM',
               'working_hours' => 8,
                'working_minutes' => 465,
                'break_time' => 15,
                'tick_minutes' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'UKOSIARKI',
                'label' => 'ukosiarki',
                'max_norm1' => 600,
                'standard_norm1' => 500,
                'min_norm1' => 400,
                'unit1' => 'PCS',
                'max_norm2' => 1700,
                'standard_norm2' => 1600,
                'min_norm2' => 1500,
                'unit2' => 'CBM',
               'working_hours' => 8,
                'working_minutes' => 465,
                'break_time' => 15,
                'tick_minutes' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'OKUCIA',
                'label' => 'ukocia',
                'max_norm1' => 600,
                'standard_norm1' => 500,
                'min_norm1' => 400,
                'unit1' => 'PCS',
                'max_norm2' => 1700,
                'standard_norm2' => 1600,
                'min_norm2' => 1500,
                'unit2' => 'CBM',
               'working_hours' => 8,
                'working_minutes' => 465,
                'break_time' => 15,
                'tick_minutes' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'PACKING',
                'label' => 'packing',
                'max_norm1' => 600,
                'standard_norm1' => 500,
                'min_norm1' => 400,
                'unit1' => 'PCS',
                'max_norm2' => 105,
                'standard_norm2' => 100,
                'min_norm2' => 95,
                'unit2' => 'CBM',
               'working_hours' => 8,
                'working_minutes' => 465,
                'break_time' => 15,
                'tick_minutes' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'KARTONY',
                'label' => 'kartony',
                'max_norm1' => 600,
                'standard_norm1' => 500,
                'min_norm1' => 400,
                'unit1' => 'PCS',
                'max_norm2' => 280,
                'standard_norm2' => 270,
                'min_norm2' => 260,
                'unit2' => 'CBM',
               'working_hours' => 8,
                'working_minutes' => 465,
                'break_time' => 15,
                'tick_minutes' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'MONTAŻ',
                'label' => 'montaz',
                'max_norm1' => 600,
                'standard_norm1' => 500,
                'min_norm1' => 400,
                'unit1' => 'PCS',
                'max_norm2' => 1700,
                'standard_norm2' => 1600,
                'min_norm2' => 1500,
                'unit2' => 'CBM',
               'working_hours' => 8,
                'working_minutes' => 465,
                'break_time' => 15,
                'tick_minutes' => 10,
                'created_at' => Carbon::now()
            ],
            );

        foreach($machines as $machine){
            DB::table('machines')->insert($machine);

        }



    }
}
