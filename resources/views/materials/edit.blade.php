@extends('layouts.main')

@section('content')
    <section class="mx-8">
        <h1 class="text-center font-bold text-3xl mt-8">
            Edit Material
        </h1>

        <form action="{{ route('materials.update', ['material' => $material->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="relative z-0 mb-6 w-full group">
                <label for="m_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Name
                </label>
                @if ($errors->has('m_name'))
                    <p class="text-red-500">
                        {{ $errors->first('m_name') }}
                    </p>
                @endif
                <input type="text" name="m_name" id="m_name"
                       class="bg-gray-50 border w-1/4 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('m_name', $material->m_name) }}"
                       placeholder="" required>
            </div>

            <div class="relative z-0 mb-6 w-full group">
                <label for="qty" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                    Quantity
                </label>
                @if ($errors->has('qty'))
                    <p class="text-red-500">
                        {{ $errors->first('qty') }}
                    </p>
                @endif
                <input type="number" name="qty" id="qty" min="1" max="30"
                       class="bg-gray-50 border w-1/4 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('qty', $material->qty) }}"
                       placeholder="" required>
            </div>

            <div>
                <button class="app-button " type="submit">Edit</button>
            </div>

        </form>
    </section>

@endsection
