<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product1 = new Product();
        $product1->name = 'มังกรประดับทีกง';
        $product1->price = 42000;
        $product1->height = 7;
        $product1->width = 0.20;
        $product1->order_id = Order::find(1)->id;
        $product1->save();

        $product2 = new Product();
        $product2->name = 'มังกรประดับทีกง';
        $product2->price = 40000;
        $product2->height = 6;
        $product2->width = 0.20;
        $product2->order_id = Order::find(2)->id;
        $product2->save();

        $product3 = new Product();
        $product3->name = 'มังกร';
        $product3->description = 'สำหรับติดด้านซ้าย';
        $product3->price = 43000;
        $product3->height = 9;
        $product3->width = 0.20;
        $product3->order_id = Order::find(3)->id;
        $product3->save();

        $product4 = new Product();
        $product4->name = 'มังกร';
        $product4->description = 'สำหรับติดด้านขวา';
        $product4->price = 43000;
        $product4->height = 9;
        $product4->width = 0.20;
        $product4->order_id = Order::find(3)->id;
        $product4->save();
    }
}
