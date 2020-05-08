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
            'name' => 'Selco',
            'norm1' => 120,
            'unit1' => 'PCS',
            'norm2' => 34.5,
            'unit2' => 'CBM',
            'working_hours' => 8,
            'working_minutes' => 480,
            'tick_minutes' => 5,
            'created_at' => Carbon::now()
            ],
            [
                'name' => 'Press',
                'norm1' => 1000 ,
                'norm2' => 3600,

                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Biesse Sb',
                'norm1' => 1500 ,
                'norm2' => 4000,

                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Biesse B1',
                'norm1' => 1000 ,
                'norm2' => 4400,

                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Akron',
                'norm1' => 1000 ,
                'norm2' => 4000,

                'created_at' => Carbon::now()
            ],
            [
                'name' => 'SKIPER /1 worker 2 machins',
                'norm1' => 1000 ,
                'norm2' => 2400,

                'created_at' => Carbon::now()
            ],
            [
                'name' => 'BIESSE FDT 1 operator 4 pomocnik',
                'norm1' => 1200 ,
                'norm2' => 13650,

                'created_at' => Carbon::now()
            ],
            [
                'name' => 'SAW',
                'norm1' => 600 ,
                'norm2' => 5600,

                'created_at' => Carbon::now()
            ],
            [
                'name' => 'FREZARKI',
                'norm1' => 600 ,
                'norm2' => 2950,

                'created_at' => Carbon::now()
            ],
            [
                'name' => 'DOLNOWRZECIONÓWKI SMALL DRILL',
                'norm1' => 600 ,
                'norm2' => 2400,

                'created_at' => Carbon::now()
            ],
            [
                'name' => 'UKOSIARKI',
                'norm1' => 600 ,
                'norm2' => 1700,

                'created_at' => Carbon::now()
            ],
            [
                'name' => 'OKUCIA',
                'norm1' => 600 ,
                'norm2' => 185,

                'created_at' => Carbon::now()
            ],
            [
                'name' => 'PACKING',
                'norm1' => 600 ,
                'norm2' => 105,

                'created_at' => Carbon::now()
            ],
            [
                'name' => 'KARTONY',
                'norm1' => 600 ,
                'norm2' => 280,

                'created_at' => Carbon::now()
            ],
            [
                'name' => 'MONTAŻ',
                'norm1' => 600 ,
                'norm2' => 1700,

                'created_at' => Carbon::now()
            ],
            );

        foreach($machines as $machine){
            DB::table('machines')->insert($machine);

        }



    }
}
