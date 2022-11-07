@extends('layouts.main')

@section('content')
    @auth
    <h1 class="mt-8 text-center text-3xl font-bold">All Orders</h1>
    <section class="mx-8">
        @if(Auth::user()->role == 'OWNER')
        <div class="mt-4 relative flex justify-end">
            <a class="app-button" href="{{ route('orders.create') }}">
                Add new Order
            </a>
        </div>
        @endif
            <div class="relative px-4">
                <span class="font-bold px-4 text-md text-gray-800">จำนวน {{$orders->count()}} รายการ</span>
            </div>
        </div>
        <div class="relative inset-0 flex items-center mt-4">
            <div class="w-full border-b border-gray-400"></div>
        </div>

        <div>
            @foreach($orders as $order)
                <a href="{{ route('orders.show', ['order' => $order->id]) }}"
                   class="block mx-8 p-6  bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 my-4">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 ">
                        {{ $order->id }} : {{ $order->order_price }} ฿
                        @if($order->order_status_id == 1)
                            <span class="ml-2 text-base font-bold bg-red-600 text-white inline-flex items-center px-2.5 py-0.5 rounded-full mr-2" >ยืนยันออเดอร์</span>
                        @elseif($order->order_status_id == 2)
                            <span class="ml-2 text-base font-bold bg-orange-400 text-white  inline-flex items-center px-2.5 py-0.5 rounded-full mr-2">กำลังดำเนินการผลิต</span>
                        @elseif($order->order_status_id == 3)
                            <span class="ml-2 text-base font-bold bg-blue-400 text-white  inline-flex items-center px-2.5 py-0.5 rounded-full mr-2">รอจัดส่ง</span>
                        @elseif($order->order_status_id == 4)
                            <span class="ml-2 text-base font-bold bg-green-600 text-white  inline-flex items-center px-2.5 py-0.5 rounded-full mr-2">จัดส่งสำเร็จ</span>
                        @endif
                    </h5>
                    <P class="bg-[#87CEFA] text-[#000000]  inline-flex items-center px-2.5 py-0.5 rounded mr-2 font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" class="w-4 h-6 inline mr-1" viewBox="0 0 16 16">
                            <path d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"/>
                            <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z"/>
                        </svg>
                        Need {{ $order->customer_need_date }}
                    </P>
                </a>
            @endforeach
        </div>
    </section>
    @endauth
@endsection
