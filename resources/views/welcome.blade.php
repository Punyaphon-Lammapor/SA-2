@extends('layouts.main')

@section('content')

    @auth


            <h1 class="flex flex-row"> Welcome {{ Auth::user()->name }} </h1>

    @endauth



@endsection
