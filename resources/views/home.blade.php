@extends('layouts.app')

@section('title')
    @if($duck)
        {{ $duck->duckname }}
    @else
        Guest
    @endif
    Homepage
@endsection

@section('content')

    @include('quacks.index')

@endsection
