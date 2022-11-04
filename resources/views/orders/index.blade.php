@extends('layouts.main')

@section('content')
    <section class="mx-8">
        <h1 class="text-3xl mx-4 mt-6">
            All Orders({{$orders->count()}})
        </h1>
        <div>
            @foreach($orders as $order)
                <a href="{{ route('orders.show', ['order' => $order->id]) }}"
                   class="block p-6 w-full bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 ">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">
                        {{ $order->id }} : {{ $order->order_price }}฿
                    </h5>
                </a>
            @endforeach
        </div>
    </section>
@endsection
