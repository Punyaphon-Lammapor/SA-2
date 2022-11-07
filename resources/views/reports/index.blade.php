@extends('layouts.main')

@section('content')

    {{--    @if($customer)--}}
    {{--            <div class="post-list">--}}
    {{--                <p>{{ $customer->firstname }} {{ $customer->lastname }}</p>--}}
    {{--            </div>--}}
    {{--    @else--}}
    {{--        <div>--}}
    {{--            <h2>No Customer found</h2>--}}
    {{--        </div>--}}
    {{--    @endif--}}
    <div>
        <section class="mx-8">

            <table class="table-auto">
                <thead>
                <tr>
                    <th>Order NO.</th>
                    <th>Order By</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer->firstname }} {{ $order->customer->lastname }}</td>
                        <td> {{ $order->customer->address }} {{ $order->customer->province->province_name }} {{ $order->customer->postal_code }}</td>
                        <td> {{ $order->customer->phone_number }}</td>
                        <td> @foreach($order->products as $product)
                                {{ $product->name }} <br>
                            @endforeach
                        </td>
                        <td> {{ $order->order_price }}</td>
                        <td>
                                    @if($order->order_status_id == 1)
                                        <span class="ml-2 text-base font-bold bg-red-600 text-white text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-full mr-2" >ยืนยันออเดอร์</span>
                                    @elseif($order->order_status_id == 2)
                                        <span class="ml-2 text-base font-bold bg-orange-400 text-white text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-full mr-2">กำลังดำเนินการผลิต</span>
                                    @elseif($order->order_status_id == 3)
                                        <span class="ml-2 text-base font-bold bg-blue-400 text-white text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-full mr-2">รอจัดส่ง</span>
                                    @elseif($order->order_status_id == 4)
                                        <span class="ml-2 text-base font-bold bg-green-600 text-white text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-full mr-2">จัดส่งสำเร็จ</span>
                                    @endif
                                </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </section>
    </div>
@endsection
