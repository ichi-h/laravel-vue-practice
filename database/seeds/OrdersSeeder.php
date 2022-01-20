<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'todo_order' => '2,1,3',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('orders')->updateOrInsert($param);
    }
}
