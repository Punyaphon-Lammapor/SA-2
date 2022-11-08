@extends('layouts.main')

@section('content')
    <section class="mx-8 my-8">
        <h1 class="mt-8 font-bold text-center text-3xl">
            Edit Order
        </h1>

        <form class="mt-8" action="{{ route('orders.update', ['order' => $order->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="flex">
                <div class="relative z-0 mb-6 w-full group">
                    <label for="customer_need_date" class="text-orange-600 block mb-2 text-sm font-medium  dark:text-gray-300">
                        Customer Need Date
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
            </div>

            <div class="flex justify-end mr-2">
                <button class="app-button" type="submit">Update</button>
            </div>

        </form>
    </section>

@endsection


