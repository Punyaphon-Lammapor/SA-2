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
            <h1 class="text-3xl text-center font-bold mx-4 mt-6">
                ออเดอร์ที่ต้องจัดส่ง
            </h1>

            <table class="mt-8 table-auto border-slate-800 p-4" style="width: 100%">
                <thead class="bg-orange-400">
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
                    @if($order->order_status_id == 3)
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
                                    @if($order->order_status_id == 3)
                                        <span class="ml-2 text-base font-bold bg-blue-400 text-white text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-full mr-2">รอจัดส่ง</span>
                                   @endif
                                </td>
                        @if($order->order_status_id != null and old('status', $order->order_status_id) != 4)
                            <td class="border border-slate-300">{{ $order->customer_need_date}}</td>
                        @endif
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </section>
    </div>
    @endauth
@endsection
