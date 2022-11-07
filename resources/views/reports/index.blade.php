@extends('layouts.main')

@section('content')
@auth
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

            <table class="table-auto border-collapse">
                <thead>
                <tr>
                    <th class="border border-slate-300">Order NO.</th>
                    <th class="border border-slate-300">Order By</th>
                    <th class="border border-slate-300">Address</th>
                    <th class="border border-slate-300">Phone Number</th>
                    <th class="border border-slate-300">Product</th>
                    <th class="border border-slate-300">Price</th>
                    <th class="border border-slate-300">Status</th>
                    <th class="border border-slate-300">Needed Date</th>

                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td class="border border-slate-300">{{ $order->id }}</td>
                        <td class="border border-slate-300">{{ $order->customer->firstname }} {{ $order->customer->lastname }}</td>
                        <td class="border border-slate-300"> {{ $order->customer->address }} {{ $order->customer->province->province_name }} {{ $order->customer->postal_code }}</td>
                        <td class="border border-slate-300"> {{ $order->customer->phone_number }}</td>
                        <td class="border border-slate-300"> @foreach($order->products as $product)
                                {{ $product->name }} <br>
                            @endforeach
                        </td>
                        <td class="border border-slate-300"> {{ $order->order_price }}</td>
                        <td class="border border-slate-300">
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
                        @if($order->order_status_id != null and old('status', $order->order_status_id) != 4)
                            <td class="border border-slate-300">{{ $order->customer_need_date}}</td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </section>
    </div>
    @endauth
@endsection
