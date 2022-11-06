@extends('layouts.main')

@section('content')
    <form class="flex items-center">
        <label for="phone_number" class="sr-only">Search</label>
        <div class="relative w-40">
            <input type="text" id="phone_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Phone Number" required>
        </div>
        <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <span class="sr-only">Search</span>
        </button>
    </form>

{{--    @if($customer)--}}
{{--            <div class="post-list">--}}
{{--                <p>{{ $customer->firstname }} {{ $customer->lastname }}</p>--}}
{{--            </div>--}}
{{--    @else--}}
{{--        <div>--}}
{{--            <h2>No Customer found</h2>--}}
{{--        </div>--}}
{{--    @endif--}}
<div>
    <section class="mx-8">
        <div>
            <a class="app-button" href="{{ route('customers.create') }}">
                Add new Customer
            </a>
        </div>
        <div class="relative py-4">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-b border-gray-300"></div>
            </div>

            <div class="relative flex justify-center">
                <span class="bg-white px-4 text-sm text-gray-500">All Customer ({{ $customers->count() }})</span>
            </div>
        </div>
        <table class="table-auto">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Province</th>
                    <th>Postal Code</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>
                            <a href="{{ route('customers.show', ['customer' => $customer->id]) }}">
                                {{ $customer->firstname }} {{ $customer->lastname }}
                            </a>
                        </td>
                        <td> {{ $customer->address }}</td>
                        <td> {{ $customer->province->province_name }}</td>
                        <td> {{ $customer->postal_code }}</td>
                        <td> {{ $customer->phone_number }}</td>
                        <td> {{ $customer->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</div>
@endsection
