@extends('layouts.main')

@section('content')
    @auth
    <section class="mx-8">
        <h1 class="text-3xl text-center font-bold mx-4 mt-6">
            All problems({{$problems->count()}})
        </h1>
        <a href="{{ route('problems.create') }}"
           class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'problems.create') current-page @endif">
            New Problem
        </a>
        <div>
            @foreach($problems as $problem)
                @if($problem->problem_status_id != null and old('status', $problem->problem_status_id) == 1)
                <a class="block p-6 w-full bg-red-200 rounded-lg border border-gray-200 shadow-md my-4">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">
                        {{ $problem->id }} : {{ $problem->problem_description }}

                    </h5>
                    <form action="{{ route('problems.updatestatus', $problem->id)}}" method="post">
                        @csrf
                        <select name ="status" id="status" class="form-control border-gray-300 relative z-0 mb-6 w-1/4 group">
                            @foreach($statuses as $status)
                                @if ($problem->problem_status_id != null and old('status', $problem->problem_status_id) == $status->id)
                                    <option value="{{$status->id}}" selected>{{$status->problem_status_process}}</option>
                                    @continue ;
                                @endif
                                <option value="{{$status->id}}">{{$status->problem_status_process}}</option>
                            @endforeach
                        </select>
                        <div class="p-2">
                            <button type="submits" class="button border border-gray-200 bg-white-200 py-2 px-2 rounded">บันทึกสถานะ</button>
                        </div>
                    </form>
                </a>
                @elseif($problem->problem_status_id != null and old('status', $problem->problem_status_id) == 2)
                    <a class="block p-6 w-full bg-green-200 rounded-lg border border-gray-200 shadow-md  my-4">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">
                            {{ $problem->id }} : {{ $problem->problem_description }}

                                <span class="ml-2 text-base font-bold bg-green-400 text-white text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-full mr-2">แก้ไขปัญหาแล้ว</span>

                        </h5>

                    </a>
                    @endif
            @endforeach
        </div>
    </section>
    @endauth
@endsection
