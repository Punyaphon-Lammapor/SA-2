@extends('layouts.main')

@section('content')

    @auth


    <h1 class="mt-8 font-bold text-center text-3xl"> Welcome {{ Auth::user()->name }} !!! </h1>

    @endauth



@endsection
