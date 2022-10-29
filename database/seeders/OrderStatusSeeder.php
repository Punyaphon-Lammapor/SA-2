<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order_status1 = new OrderStatus();
        $order_status1->order_status_process = 'ยืนยันออเดอร์';
        $order_status1->save();

        $order_status2 = new OrderStatus();
        $order_status2->order_status_process = 'กำลังดำเนินการผลิต';
        $order_status2->save();

        $order_status3 = new OrderStatus();
        $order_status3->order_status_process = 'รอจัดส่ง';
        $order_status3->save();

        $order_status4 = new OrderStatus();
        $order_status4->order_status_process = 'จัดส่งสำเร็จ';
        $order_status4->save();
    }
}
