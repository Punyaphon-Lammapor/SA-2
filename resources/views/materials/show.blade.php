{{-- resources/views/posts/show.blade.php --}}
@extends('layouts.main')

@section('content')
    <article class="mx-8">
        <h1 class="text-3xl mb-1">
            Material Number : {{ $material->id }}
        </h1>

        <p>
            Material Name: {{ $material->m_name }}
        </p>

        <p>
            Material Quantity: {{ $material->qty }}
        </p>


    </article>



@endsection

