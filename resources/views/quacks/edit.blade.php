@extends('layouts.app')
@section('title')
    Quack Edit
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-8 m-3 p-0">
                <div class="card-body pb-1">
                    <h5 class="card-title"><strong>{{ $quack->duck->duckname }}</strong></h5>
                    <div class="container">
                        <div class="row justify-content-center">
                            <form class="form col-12 pl-0 pr-0 " method="POST"
                                  action="{{ route('quacks.update', $quack) }}">
                                @csrf
                                @method('PUT')
                                <div class="row align-items-center">
                                    <div class="form-group col-10">
                                        <textarea class="form-control bg-light" id="content" name="content"
                                                  rows="3">{{ $quack->content }}</textarea>
                                    </div>
                                    <div class="form-group col-2 text-center align-items-center">
                                        <div class="custom-media btn btn-block btn-outline-success mb-2">
                                            <i class="fas fa-upload"></i> Media
                                            <input type="file" class="form-control-file custom-input" id="image"
                                                   name="image">
                                        </div>
                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-block btn-success">Edit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
