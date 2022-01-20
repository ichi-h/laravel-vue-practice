<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 3; $i++) {
            $param = [
                'task' => "task $i",
                'is_done' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ];
            DB::table('todos')->updateOrInsert($param);
        }
    }
}
