<?php

namespace Database\Seeders;

use App\Models\ProblemStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProblemStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $problem_status1 = new ProblemStatus();
        $problem_status1->problem_status_process = 'ได้รับแจ้งปัญหา';
        $problem_status1->save();

        $problem_status1 = new ProblemStatus();
        $problem_status1->problem_status_process = 'แก้ไขปัญหาแล้ว';
        $problem_status1->save();
    }
}
