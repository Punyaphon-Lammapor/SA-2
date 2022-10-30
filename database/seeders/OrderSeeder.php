<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderStatus;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order1 = new Order();
        $order1->product_qty = 1;
        $order1->order_price = 42000;
        $order1->customer_id = Customer::where('phone_number', '056276599')->first()->id;
        $order1->order_status_id = OrderStatus::where('order_status_process', 'จัดส่งสำเร็จ')->first()->id;
        $order1->customer_need_date = Carbon::parse('2022-07-07');
        $order1->save();

        $order2 = new Order();
        $order2->product_qty = 1;
        $order2->order_price = 40000;
        $order2->customer_id = Customer::where('phone_number', '0871418229')->first()->id;
        $order2->order_status_id = OrderStatus::where('order_status_process', 'จัดส่งสำเร็จ')->first()->id;
        $order2->customer_need_date = Carbon::parse('2022-07-26');
        $order2->save();

        $order3 = new Order();
        $order3->product_qty = 2;
        $order3->order_price = 86000;
        $order3->customer_id = Customer::where('phone_number', '056213614')->first()->id;
        $order3->order_status_id = OrderStatus::where('order_status_process', 'รอจัดส่ง')->first()->id;
        $order3->customer_need_date = Carbon::parse('2022-09-10');
        $order3->save();

        $order4 = new Order();
        $order4->product_qty = 1;
        $order4->order_price = 42000;
        $order4->customer_id = Customer::where('phone_number', '039381378')->first()->id;
        $order4->order_status_id = OrderStatus::where('order_status_process', 'กำลังดำเนินการผลิต')->first()->id;
        $order4->customer_need_date = Carbon::parse('2022-10-04');
        $order4->save();
    }
}
