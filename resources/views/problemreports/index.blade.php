@extends('layouts.main')

@section('content')
    @auth

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
        <h1 class="text-3xl mx-4 mt-6">
            ปัญหาที่รอการแก้ไข
        </h1>
        <h1 class="mt-8 text-center text-3xl font-bold">All Problems</h1>
        <section class="flex justify-center mx-8">
            <table class="mt-8 table-auto border-slate-800 p-4" style="width: 100%">
                <thead class="bg-orange-400">
                <tr>
                    <th class="border border-slate-300">Problem NO.</th>
                    <th class="border border-slate-300">Problem Description</th>
                    <th class="border border-slate-300">Customer Name</th>
                    <th class="border border-slate-300">Customer Phone</th>
                    <th class="border border-slate-300">Address</th>
                    <th class="border border-slate-300">Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($problems as $problem)
                    @if($problem->problem_status_id == 1)
                    <tr>
                        <td class="border border-slate-300">{{ $problem->id }}</td>
                        <td class="border border-slate-300">{{ $problem->problem_description }}</td>
                        <td class="border border-slate-300">{{ $problem->order->customer->firstname }} {{ $problem->order->customer->lastname }}</td>
                        <td class="border border-slate-300"> {{ $problem->order->customer->phone_number }}</td>
                        <td class="border border-slate-300"> {{ $problem->order->customer->address }} {{ $problem->order->customer->province->province_name }} {{ $problem->order->customer->postal_code }}</td>
                        <td class="border border-slate-300">
                                    @if($problem->problem_status_id == 2)
                                        <span class="ml-2 text-base font-bold bg-green-400 text-white text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-full mr-2">แก้ไขปัญหาแล้ว</span>
                                   @endif
                                </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </section>
    </div>
    @endauth
@endsection
