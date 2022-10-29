<?php

namespace Database\Seeders;

use App\Models\ProductStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_status1 = new ProductStatus();
        $product_status1->product_status_process = 'กำลังผลิต';
        $product_status1->save();

        $product_status2 = new ProductStatus();
        $product_status2->product_status_process = 'กำลังตรวจสอบ';
        $product_status2->save();

        $product_status3 = new ProductStatus();
        $product_status3->product_status_process = 'ซ่อมแซมสินค้า';
        $product_status3->save();

        $product_status4 = new ProductStatus();
        $product_status4->product_status_process = 'เสร็จสิ้น';
        $product_status4->save();
    }
}
