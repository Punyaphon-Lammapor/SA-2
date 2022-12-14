{{-- resources/views/posts/show.blade.php --}}
@extends('layouts.main')

@section('content')
    <article class="mx-8">
        <h1 class="mt-8 text-center font-bold text-3xl mb-1">
            Customer Name : {{ $customer->firstname }} {{ $customer->lastname }}
        </h1>

        <div class="mt-8">
            <p>
                Address : {{ $customer->address }} {{ $customer->province->province_name }} {{ $customer->postal_code }}
            </p>
            <p>Phone Number : {{ $customer->phone_number }}</p>
            @if($customer->email != "")
            <p>Email : {{ $customer->email }}</p>
            @else
            <p>Email : - </p>
            @endif
        </div>
        <br>
        <div>
            <a class="app-button" href="{{ route('customers.edit', ['customer' => $customer->id]) }}">
                Edit this Customer
            </a>
        </div>

        <div class="relative py-4">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-b border-gray-300"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="font-bold bg-white px-4 text-sm text-gray-500">Order ({{ $customer->orders->count() }})</span>
            </div>
        </div>

    </article>

    @if ($customer->orders)
        <section class="mt-8 mx-16">
            @foreach($customer->orders as $order)
                <a href="{{ route('orders.show', ['order' => $order->id]) }}"
                   class="block p-6 w-full bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 ">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 ">
                        {{ $order->id }} : {{ $order->order_price }}
                    </h5>
                </a>
            @endforeach
        </section>
    @endif


@endsection

