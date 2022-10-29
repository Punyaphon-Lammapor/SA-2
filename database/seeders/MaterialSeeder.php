<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mat1 = new Material();
        $mat1->m_name = 'ไฟกระพริบ';
        $mat1->qty = 10;
        $mat1->save();

        $mat2 = new Material();
        $mat2->m_name = 'ลวด';
        $mat2->qty = 10;
        $mat2->save();

        $mat3 = new Material();
        $mat3->m_name = 'cable tie (ถุง)';
        $mat3->qty = 50;
        $mat3->save();
    }
}
