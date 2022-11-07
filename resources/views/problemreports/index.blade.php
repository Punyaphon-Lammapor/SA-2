@extends('layouts.main')

@section('content')

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

            <table class="table-auto border-collapse">
                <thead>
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
                    <tr>
                        <td class="border border-slate-300">{{ $problem->id }}</td>
                        <td class="border border-slate-300">{{ $problem->problem_description }}</td>
                        <td class="border border-slate-300">{{ $problem->order->customer->firstname }} {{ $problem->order->customer->lastname }}</td>
                        <td class="border border-slate-300"> {{ $problem->order->customer->phone_number }}</td>
                        <td class="border border-slate-300"> {{ $problem->order->customer->address }} {{ $problem->order->customer->province->province_name }} {{ $problem->order->customer->postal_code }}</td>
                        <td class="border border-slate-300">
                                    @if($problem->problem_status_id == 1)
                                        <span class="ml-2 text-base font-bold bg-red-600 text-white text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-full mr-2" >ได้รับแจ้งปัญหา</span>
                                    @elseif($problem->problem_status_id == 2)
                                        <span class="ml-2 text-base font-bold bg-green-400 text-white text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-full mr-2">แก้ไขปัญหาแล้ว</span>
                                   @endif
                                </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </section>
    </div>
@endsection
