@extends('layouts.app')
@section('title')
    Quacks
@endsection
<style>
    div {
        position: relative;
        overflow: hidden;
    }
    input {
        position: absolute;
        font-size: 50px;
        opacity: 0;
        right: 0;
        top: 0;
    }
</style>
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <form class="form col-8 pl-0 pr-0" method="POST" action="{{ route('quacks.store') }}">
                @csrf
                <div class="row align-items-center">
                    <div class="form-group col-10">
                        <textarea class="form-control" id="content" name="content" rows="3"
                                  placeholder="publish something..."></textarea>
                    </div>
                    <div class="form-group col-2 text-center align-items-center">
                        <div class="file btn btn-block btn-outline-primary mb-2">
                            <i class="fas fa-upload"></i> Media
                            <input type="file" name="file">
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-block btn-primary">Publish</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @foreach($quacks as $quack)

    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-8 m-3">
                <div class="card-body">
                    <p class="card-title">{{ $quack->duck->duckname }}</p>
                    <p class="card-text">{{ $quack->content }}</p>
                </div>
                <div class="card-footer bg-transparent">Footer</div>
            </div>
        </div>
    </div>
    @endforeach


@endsection
