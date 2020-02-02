<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class pic extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pic_table')->insert([
            [
                'pic_code' => 'BUD',
                'pic_name' => 'BUDI',
            ],
            [
                'pic_code' => 'JOH',
                'pic_name' => 'JOHNATAM',
            ],
            [
                'pic_code' => 'STE',
                'pic_name' => 'STEVEN',
            ],
            [
                'pic_code' => 'MAR',
                'pic_name' => 'MARRY',
            ],
            [
                'pic_code' => 'NIC',
                'pic_name' => 'NICHOLAS',
            ],
        ]);
    }
}
