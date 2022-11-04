@extends('layouts.main')

@section('content')
    <section class="mx-8">
        <h1 class="text-3xl mx-4 mt-6">
            All Customers
        </h1>
        <div>
            @foreach($customers as $customer)
{{--                <a href="{{ route('customers.show', ['customer' => $customer->id]) }}"--}}
{{--                   class="block p-6 w-full bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 ">--}}
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">
                        {{ $customer->firstname }} {{ $customer->lastname }}
                    </h5>
{{--                </a>--}}
            @endforeach
        </div>
    </section>
@endsection
