@extends('layouts.main')

@section('content')
    @auth
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


        <div class="container-fluid mt-8">
			<table class="table-auto border-slate-800 p-4" style="width:100%">
				<thead class="bg-orange-400">
					<tr>
                        <th class="border border-slate-300">Name</th>
                        <th class="border border-slate-300">Quantity</th>
					</tr>
				</thead>
				<tbody>
            @foreach($materials as $material)
                    <tr>
                        <td class="border border-slate-300">
                            <a href="{{ route('materials.show', ['material' => $material->id]) }}">
                                @if ($material->qty < 11 )
                                    <h5 class="ml-2 mb-2 tracking-tight text-red-500 ">
                                        {{ $material->m_name }}
                                    </h5>
                                @endif
                                @if ($material->qty >= 11 )
                                    <h5 class="ml-2 mb-2 tracking-tight text-gray-900 ">
                                        {{ $material->m_name }}
                                    </h5>
                                @endif
                            </a>
                        </td>
                        <td class="border border-slate-300">
                            @if ($material->qty < 11 )
                            <h5 class="ml-2 mb-2 tracking-tight text-red-500 ">
                                {{ $material->qty }}
                            </h5>
                            @endif
                            @if ($material->qty >= 11 )
                                <h5 class="ml-2 mb-2 tracking-tight text-gray-900 ">
                                    {{ $material->qty }}
                                </h5>
                            @endif
                        </td>
                    </tr>
					@endforeach
				</tbody>
			</table>
		</div>
    </section>
    @endauth
@endsection
