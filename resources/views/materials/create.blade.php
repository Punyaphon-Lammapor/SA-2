@extends('layouts.main')

@section('content')
    <section class="mx-8">
        <h1 class="text-3xl mb-6">
            Add New Material
        </h1>

        <form action="{{ route('materials.store') }}" method="post">
            @csrf

            <div class="relative z-0 mb-6 w-full group">
                <label for="firstname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Name
                </label>
                @if ($errors->has('m_name'))
                    <p class="text-red-500">
                        {{ $errors->first('m_name') }}
                    </p>
                @endif
                <input type="text" name="m_name" id="m_name"
                       class="bg-gray-50 border @if($errors->has('m_name')) border-red-300 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('m_name') }}"
                       placeholder="" required>
            </div>

            <div class="relative z-0 mb-6 w-full group">
                <label for="qty" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Quantity
                </label>
                @if ($errors->has('qty'))
                    <p class="text-red-500">
                        {{ $errors->first('qty') }}
                    </p>
                @endif
                <input type="number" name="qty" id="qty" min="1" max="30"
                       class="bg-gray-50 border @if($errors->has('qty')) border-red-300 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('qty') }}"
                       placeholder="" required>
            </div>


            <div>
                <button class="app-button" type="submit">Create</button>
            </div>
        </form>
    </section>

@endsection
