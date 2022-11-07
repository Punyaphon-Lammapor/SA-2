<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Problem;
use App\Models\ProblemStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProblemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $problem1 = new Problem();
        $problem1->problem_description = 'ไฟส่วนหัวไม่ติด';
        $problem1->order_id = Order::find(2)->id;
        $problem1->problem_status_id = ProblemStatus::where('problem_status_process', 'ได้รับแจ้งปัญหา')->first()->id;
        $problem1->save();

        $problem2 = new Problem();
        $problem2->problem_description = 'ไฟกระพริบ delay นาน';
        $problem2->order_id = Order::find(1)->id;
        $problem2->problem_status_id = ProblemStatus::where('problem_status_process', 'แก้ไขปัญหาแล้ว')->first()->id;
        $problem2->save();
    }
}
