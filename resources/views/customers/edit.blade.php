@extends('layouts.main')

@section('content')
    <section class="mx-8">
        <h1 class="text-3xl mb-6">
            Edit Customer
        </h1>

        <form action="{{ route('customers.update', ['customer' => $customer->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="relative z-0 mb-6 w-full group">
                <label for="firstname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Firstname
                </label>
                @if ($errors->has('firstname'))
                    <p class="text-red-500">
                        {{ $errors->first('firstname') }}
                    </p>
                @endif
                <input type="text" name="firstname" id="firstname"
                       class="bg-gray-50 border @if($errors->has('firstname')) border-red-300 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('firstname', $customer->firstname) }}"
                       placeholder="" required>
            </div>

            <div class="relative z-0 mb-6 w-full group">
                <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Lastname
                </label>
                @if ($errors->has('lastname'))
                    <p class="text-red-500">
                        {{ $errors->first('lastname') }}
                    </p>
                @endif
                <input type="text" name="lastname" id="lastname"
                       class="bg-gray-50 border @if($errors->has('lastname')) border-red-300 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('lastname', $customer->lastname) }}"
                       placeholder="" required>
            </div>

            <div class="relative z-0 mb-6 w-full group">
                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Address
                </label>
                @if ($errors->has('address'))
                    <p class="text-red-500">
                        {{ $errors->first('address') }}
                    </p>
                @endif
                <input type="text" name="address" id="address"
                       class="bg-gray-50 border @if($errors->has('address')) border-red-300 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('address', $customer->address) }}"
                       placeholder="" required>
            </div>

            {{--      province--}}
            <div class="mb-6 create-tag-contener">
                <label for="province" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Province
                </label>
                <select name="province" id = 'province' class="block w-500 mt-1 create-tag-contener" required>
                    @foreach ($provinces as $province)
                        <option value="{{ $province->id }}">{{ $province->province_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="relative z-0 mb-6 w-full group">
                <label for="postal_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Postal Code
                </label>
                @if ($errors->has('postal_code'))
                    <p class="text-red-500">
                        {{ $errors->first('postal_code') }}
                    </p>
                @endif
                <input type="text" name="postal_code" id="postal_code"
                       class="bg-gray-50 border @if($errors->has('postal_code')) border-red-300 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('postal_code', $customer->postal_code) }}"
                       placeholder="" required>
            </div>

            <div class="relative z-0 mb-6 w-full group">
                <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Phone Number
                </label>
                @if ($errors->has('phone_number'))
                    <p class="text-red-500">
                        {{ $errors->first('phone_number') }}
                    </p>
                @endif
                <input type="text" name="phone_number" id="phone_number"
                       class="bg-gray-50 border @if($errors->has('phone_number')) border-red-300 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('phone_number', $customer->phone_number) }}"
                       placeholder="" required>
            </div>

            <div class="relative z-0 mb-6 w-full group">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Email
                </label>
                @if ($errors->has('email'))
                    <p class="text-red-500">
                        {{ $errors->first('email') }}
                    </p>
                @endif
                <input type="text" name="email" id="email"
                       class="bg-gray-50 border @if($errors->has('email')) border-red-300 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('email', $customer->email) }}"
                       placeholder="">
            </div>

            <div>
                <button class="app-button" type="submit">Update</button>
            </div>

        </form>
    </section>

@endsection


