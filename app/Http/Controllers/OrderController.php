<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\DeliveryNote;
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
        $validated = $request->validate([
            'product_qty' => ['min:1', 'max:5'],
            'customer_need_date' => ['required', 'after:tomorrow']
        ]);

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
        $statuses = OrderStatus::all();
        return view('orders.show', ['order' => $order],['statuses' => $statuses]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('orders.edit', ['order' => $order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'customer_need_date' => ['required', 'after:today']
        ]);
        $order->customer_need_date = $request->input('customer_need_date');
        $order->save();
        return redirect()->route('orders.show', ['order' => $order->id]);
    }

    public function updateStatus(Request $request, Order $order){
        if($request->input('status')) {
            $order->order_status_id = $request->input('status');
            $order->save();
        }
            return redirect()->route('orders.show', ['order' => $order->id]);
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
        $product->name = $request->input('product');
        if($request->has('description')){
            $product->description = $request->input('description');
        } else {
            $product->description = null;
        }
        $product->height = $request->input('height');
        $product->width = $request->input('width');
        $product->price = $request->input('price');
        $order->products()->save($product);

        return redirect()->route('orders.show', ['order' => $order->id]);
    }

    public function storeDeliveryNote(Request $request, Order $order) {

        $validated = $request->validate([
            'delivery_date' => ['required', 'before:tomorrow'],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $delivery_note = new DeliveryNote();
        $delivery_note->delivery_date = $request->input('delivery_date');
        if($request->has('delivery_description')){
            $delivery_note->delivery_description = $request->input('delivery_description');
        } else {
            $delivery_note->delivery_description = null;
        }

        if($request->hasFile('image')) {
            $filename = $request->file('image')->getClientOriginalName();
            $request->image->move(storage_path('app/public/images'), $filename);
            $delivery_note->image = $filename;
        }
        $order->deliveryNote()->save($delivery_note);

        $order->order_status_id = OrderStatus::where('order_status_process', 'จัดส่งสำเร็จ')->first()->id;
        $order->save();
        return redirect()->route('orders.show', ['order' => $order->id]);
    }

}
