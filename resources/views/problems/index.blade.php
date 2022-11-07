@extends('layouts.main')

@section('content')
    <section class="mx-8">
        <h1 class="text-3xl mx-4 mt-6">
            All problems({{$problems->count()}})
        </h1>
        <a href="{{ route('problems.create') }}"
           class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'problems.create') current-page @endif">
            New Problem
        </a>
        <div>
            @foreach($problems as $problem)
                <a class="block p-6 w-full bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 my-4">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">
                        {{ $problem->id }} : {{ $problem->problem_description }}
                        @if($problem->problem_status_id == 1)
                            <span class="ml-2 text-base font-bold bg-red-600 text-white text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-full mr-2" >ได้รับแจ้งปัญหา</span>
                        @elseif($problem->problem_status_id == 2)
                            <span class="ml-2 text-base font-bold bg-green-400 text-white text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-full mr-2">แก้ไขปัญหาแล้ว</span>
                        @endif
                    </h5>

                </a>
            @endforeach
        </div>
    </section>
@endsection
