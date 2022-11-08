@extends('layouts.main')

@section('content')
    <section class="mx-8">
        <h1 class="text-3xl mb-6">
            Add new Problem
        </h1>

        <form action="{{ route('problems.store') }}" method="post">
            @csrf

            <div class="mb-6 create-tag-contener">
                <label for="order_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Order Owner
                </label>
                <select name="order_id" id = 'order_id' class="block w-500 mt-1 create-tag-contener" required>
                    @foreach ($orders as $order)
                        <option value="{{ $order->id }}">{{ $order->customer->firstname }} {{ $order->customer->lastname }}</option>
                    @endforeach
                </select>
            </div>

            <div class="relative z-0 mb-6 w-full group">
                <label for="problem_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Description
                </label>
                @if ($errors->has('problem_description'))
                    <p class="text-red-500">
                        {{ $errors->first('problem_description') }}
                    </p>
                @endif
                <input type="text" name="problem_description" id="problem_description" min="1" max="5"
                       class="bg-gray-50 w-1/3 border @if($errors->has('problem_description')) border-red-300 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('problem_description') }}"
                       placeholder="" required>
            </div>

            <div>
                <button class="app-button" type="submit">Create</button>
            </div>
        </form>
    </section>

@endsection
