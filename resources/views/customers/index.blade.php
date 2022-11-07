@extends('layouts.main')

@section('content')

<div class="flex flex-row justify-center mt-8">    

{{--    @if($foundCustomers->isNotEmpty)--}}
{{--            @foreach($foundCustomers as $foundCustomer)--}}
{{--                <a href="{{ route('customers.show', ['customer' => $foundCustomer->id]) }}">--}}
{{--                    <p>{{ $foundCustomer->firstname }} {{ $foundCustomer->lastname }}</p>--}}
{{--                </a>--}}
{{--            @endforeach--}}
{{--    @else--}}
{{--        <div>--}}
{{--            <h2>No Customer found</h2>--}}
{{--        </div>--}}
{{--    @endif--}}
    <section class="mx-8">
        <div class="relative py-4">
            <a class="app-button" href="{{ route('customers.create') }}">
                Add new Customer
            </a>
        </div>
        <div>
            <form action="{{ route('customers.index') }}" class="flex justify-end items-center mt-4" method="GET">
                <label for="search" class="sr-only">Search</label>
                <div class="relative w-80">
                    <input type="text" id="search" class=" text-gray-900 text-sm rounded-lg block w-full pl-10 p-2.5 
                    bg-gray-500 border-gray-400 focus:ring-gray-500 focus:border-gray-500
                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                    dark:focus:ring-gray-500 dark:focus:border-gray-500" placeholder="Firstname, Lastname, Phone Number" 
                      required>
                </div>
                <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-orange-700 rounded-lg border border-orange-700 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <span class="sr-only">Search</span>
                </button>
            </form>
            <div class="flex justify-end mt-8">
                <div class="relative flex ">
                    <span class="font-bold px-4 text-sm text-gray-800">All Customer ({{ $customers->count() }})</span>
                </div>
            </div>
        </div>
        <div class="relative inset-0 flex items-center mt-4">
            <div class="w-full border-b border-gray-400"></div>
        </div>

        <div class="container-fluid mt-8">
			<table class="border border-slate-800 table table-striped p-4" style="width:100%">
				<thead class="bg-white">
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
		</div>

    </section>
</div>
@endsection
