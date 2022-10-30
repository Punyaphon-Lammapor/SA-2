<?php

namespace Database\Seeders;

use App\Models\DeliveryNote;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryNoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $note1 = new DeliveryNote();
        $note1->delivery_date = Carbon::parse('2022-07-05');
        $note1->order_id = Order::find(1)->id;
        $note1->save();

        $note2 = new DeliveryNote();
        $note2->delivery_date = Carbon::parse('2022-07-26');
        $note2->order_id = Order::find(2)->id;
        $note2->save();

        $note3 = new DeliveryNote();
        $note3->delivery_description = 'ติดหน้าศาลเจ้า ซ้าย-ขวา';
        $note3->delivery_date = Carbon::parse('2022-09-10');
        $note3->order_id = Order::find(3)->id;
        $note3->save();
    }
}
