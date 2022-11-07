@extends('layouts.main')

@section('content')
    <section class="mx-8">
        <h1 class="text-3xl mx-4 mt-6">
            All materials({{$materials->count()}})
        </h1>
        <a href="{{ route('materials.create') }}"
           class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'materials.create') current-page @endif">
            New Material
        </a>
        <div>
            @foreach($materials as $material)
                <a href="{{ route('materials.show', ['material' => $material->id]) }}"
                   class="block p-6 w-full bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 ">
                    @if ($material->qty <= 5 )
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-red-500 ">
                        {{ $material->m_name }} :  {{ $material->qty }}
                    </h5>
                    @endif
                        @if ($material->qty > 5 )
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">
                                {{ $material->m_name }} :  {{ $material->qty }}
                            </h5>
                        @endif
                </a>
            @endforeach
        </div>
    </section>
@endsection
