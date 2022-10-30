<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer1 = new Customer();
        $customer1->firstname = 'ศิริพร';
        $customer1->lastname = 'พิพัฒสัตยานุวงศ์';
        $customer1->address = 'Innofresh Company 48 หมู่ 2 ถนนสุวรรณศร ต.ป่าขะ อ.บ้านนา';
        $customer1->province_id = Province::where('province_name', 'นครนายก')->first()->id;
        $customer1->postal_code = '26110';
        $customer1->phone_number = '0871418229';
        $customer1->email = 'sale@innofresh.co.th';
        $customer1->save();

        $customer2 = new Customer();
        $customer2->firstname = 'ปราการ';
        $customer2->lastname = 'วิบูลย์วัฒนกิจ';
        $customer2->address = 'มูลนิธิส่งเสริมประเพณีแห่เจ้าพ่อ-เจ้าแม่ปากน้ำโพ 94/2 ถนน โกสีย์ ต. ปากน้ำโพ อ.เมือง';
        $customer2->province_id = Province::where('province_name', 'นครสวรรค์')->first()->id;
        $customer2->postal_code = '60000';
        $customer2->phone_number = '056213614';
        $customer2->email = 'admin@paknampho.org';
        $customer2->save();

        $customer3 = new Customer();
        $customer3->firstname = 'รงค์';
        $customer3->lastname = 'บัวเทศ';
        $customer3->address = 'ศาลเจ้าพ่อเทพารักษ์-เจ้าแม่ทับทิม 34 ซอย โกสีย์ 13 ต.ปากน้ำโพ อ.เมือง';
        $customer3->province_id = Province::where('province_name', 'นครสวรรค์')->first()->id;
        $customer3->postal_code = '60000';
        $customer3->phone_number = '056276599';
        $customer3->save();

        $customer4 = new Customer();
        $customer4->firstname = 'ศิริชัย';
        $customer4->lastname = 'โสภิตเจริญ';
        $customer4->address = 'ศาลเจ้าปะตง 500/16 ม.1 ต.ปะตง อ.สอยดาว';
        $customer4->province_id = Province::where('province_name', 'จันทบุรี')->first()->id;
        $customer4->postal_code = '22180';
        $customer4->phone_number = '039381378';
        $customer4->save();
    }
}
