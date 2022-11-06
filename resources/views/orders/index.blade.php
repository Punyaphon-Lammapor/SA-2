@extends('layouts.main')

@section('content')
    <section class="mx-8">
        <div>
            <a class="app-button" href="{{ route('orders.create') }}">
                Add new Order
            </a>
        </div>

        <div class="relative py-4">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-b border-gray-300"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="bg-white px-4 text-sm text-gray-500">All Orders ({{$orders->count()}})</span>
            </div>
        </div>

        <div>
            @foreach($orders as $order)
                <a href="{{ route('orders.show', ['order' => $order->id]) }}"
                   class="block p-6 w-full bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 my-4">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">
                        {{ $order->id }} : {{ $order->order_price }} ฿
                    </h5>
                    <P class="bg-[#87CEFA] text-[#000000] text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 font-semibold">
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
@endsection
