<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class customer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer_table')->insert([
            [
                'customer_name' => 'Jonathan',
                'customer_category' => 'Debitur',
                'pic_id' => '1',
            ],
            [
                'customer_name' => 'Angeline',
                'customer_category' => 'Debitur',
                'pic_id' => '3',
            ],
            [
                'customer_name' => 'Aaron',
                'customer_category' => 'Nasabah',
                'pic_id' => '2',
            ],
            [
                'customer_name' => 'Dominic',
                'customer_category' => 'Nasabah',
                'pic_id' => '5',
            ],
            [
                'customer_name' => 'Stevany',
                'customer_category' => 'Debitur',
                'pic_id' => '3',
            ],
        ]);
    }
}
