@extends('layouts.main')

@section('content')
    <section class="mx-8">
        <h1 class="text-3xl mb-6">
            Add new Order
        </h1>

        <form action="{{ route('orders.store') }}" method="post">
            @csrf

            <div class="mb-6 create-tag-contener">
                <label for="customer_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Customer
                </label>
                <select name="customer_id" id = 'customer_id' class="block w-500 mt-1 create-tag-contener" required>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->firstname }} {{ $customer->lastname }}</option>
                    @endforeach
                </select>
            </div>

            <div class="relative z-0 mb-6 w-full group">
                <label for="product_qty" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Quantity
                </label>
                @if ($errors->has('product_qty'))
                    <p class="text-red-500">
                        {{ $errors->first('product_qty') }}
                    </p>
                @endif
                <input type="number" name="product_qty" id="product_qty" min="1" max="5"
                       class="bg-gray-50 border @if($errors->has('product_qty')) border-red-300 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('product_qty') }}"
                       placeholder="" required>
            </div>

            <div class="relative z-0 mb-6 w-full group">
                <label for="order_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Price
                </label>
                @if ($errors->has('order_price'))
                    <p class="text-red-500">
                        {{ $errors->first('order_price') }}
                    </p>
                @endif
                <input type="number" name="order_price" id="order_price"
                       class="bg-gray-50 border @if($errors->has('order_price')) border-red-300 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('order_price') }}"
                       placeholder="" required>
            </div>

            <div class="relative z-0 mb-6 w-full group">
                <label for="customer_need_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Price
                </label>
                @if ($errors->has('customer_need_date'))
                    <p class="text-red-500">
                        {{ $errors->first('customer_need_date') }}
                    </p>
                @endif
                <input type="date" name="customer_need_date" id="customer_need_date"
                       class="bg-gray-50 border @if($errors->has('customer_need_date')) border-red-300 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('customer_need_date') }}"
                       placeholder="" required >

            </div>

            <div>
                <button class="app-button" type="submit">Create</button>
            </div>
        </form>
    </section>

@endsection
