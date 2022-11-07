{{-- resources/views/posts/show.blade.php --}}
@extends('layouts.main')

@section('content')
    <article class="mx-8">
        <h1 class="text-3xl mt-8 text-center font-bold">
            Material Number : {{ $material->id }}
        </h1>
        <div class="mt-8">
            <p>
                Material Name: {{ $material->m_name }}
            </p>
            
            <p>
                Material Quantity: {{ $material->qty }}
            </p>
        </div>

        <div class="mt-4">
            <a class="app-button" href="{{ route('materials.edit', ['material' => $material->id]) }}">
                Edit
            </a>
        </div>

    </article>



@endsection

