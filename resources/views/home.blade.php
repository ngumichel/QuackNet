@extends('layouts.app')

@section('title')
    {{ $duck->duckname }} Homepage
@endsection

@section('content')

   @include('quacks.index')

@endsection
