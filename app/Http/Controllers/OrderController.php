<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\ProductStatus;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::get();
        return view('orders.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        return view('orders.create', ['customers'=> $customers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order();
        $order->product_qty = $request->input('product_qty');
        $order->order_price = $request->input('order_price');
        $order->customer_id = $request->input('customer_id');
        $order->order_status_id = OrderStatus::where('order_status_process', 'ยืนยันออเดอร์')->first()->id;
        $order->customer_need_date = $request->input('customer_need_date');
        $order->save();
        return redirect()->route('orders.index')->with('status', 'Order Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.show', ['order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function storeProduct(Request $request, Order $order)
    {
        $product = new Product();
        $product->name = $request->input('name');
        if($request->has('description')){
            $product->description = $request->input('description');
        } else {
            $product->description = null;
        }
        $product->height = $request->input('height');
        $product->width = $request->input('width');
        $product->price = $request->input('price');
        $product->product_status_id = ProductStatus::where('product_status_process', 'กำลังผลิต')->first()->id;
        $order->products()->save($product);

        return redirect()->route('orders.show', ['order' => $order->id]);
    }
}