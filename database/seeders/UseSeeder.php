<?php

namespace Database\Seeders;

use App\Models\Material;
use App\Models\Product;
use App\Models\Used;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $used1 = new Used();
        $used1->product_id = Product::find(1)->id;
        $used1->material_id = Material::find(1)->id;
        $used1->used_qty = 2;
        $used1->save();

        $used2 = new Used();
        $used2->product_id = Product::find(1)->id;
        $used2->material_id = Material::find(2)->id;
        $used2->used_qty = 1;
        $used2->save();

        $used3 = new Used();
        $used3->product_id = Product::find(1)->id;
        $used3->material_id = Material::find(3)->id;
        $used3->used_qty = 2;
        $used3->save();

        $used4 = new Used();
        $used4->product_id = Product::find(2)->id;
        $used4->material_id = Material::find(1)->id;
        $used4->used_qty = 2;
        $used4->save();

        $used5 = new Used();
        $used5->product_id = Product::find(2)->id;
        $used5->material_id = Material::find(2)->id;
        $used5->used_qty = 1;
        $used5->save();

        $used6 = new Used();
        $used6->product_id = Product::find(2)->id;
        $used6->material_id = Material::find(3)->id;
        $used6->used_qty = 2;
        $used6->save();
    }
}
