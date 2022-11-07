@extends('layouts.main')

@section('content')
    <h1 class="mt-8 text-center text-3xl font-bold">All Materials</h1>
    <section class="mx-8">
        <div class="mt-4 relative flex justify-end">
            <a href="{{ route('materials.create') }}"
               class="app-button mr-2" @if(Route::currentRouteName() === 'materials.create') current-page @endif">
                New Material
            </a>
        </div>
        <div class="relative px-4">
            <span class="font-bold px-4 text-md text-gray-800">จำนวน {{$materials->count()}} รายการ</span>
        </div>
        <div class="relative inset-0 flex items-center mt-4">
            <div class="w-full border-b border-gray-400"></div>
        </div>
        <div class="mt-4">
            @foreach($materials as $material)
                <a href="{{ route('materials.show', ['material' => $material->id]) }}"
                   class="block mx-8 p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 my-4">
                    @if ($material->qty < 11 )
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-red-500 ">
                        {{ $material->m_name }} :  {{ $material->qty }}
                    </h5>
                    @endif
                        @if ($material->qty >= 11 )
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 ">
                                {{ $material->m_name }} :  {{ $material->qty }}
                            </h5>
                        @endif
                </a>
            @endforeach
        </div>
    </section>
@endsection
