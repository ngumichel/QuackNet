@extends('layouts.app')
@section('title')
    Search results
@endsection

@section('content')
    @foreach($quacks as $quack)
        <div class="container">
            <div class="row justify-content-center">
                <div class="card col-8 m-3 p-0">
                    <div class="card-body pb-1">
                        @if($quack->duck_id == $duck->id)
                            <form class="form" action="{{ route('quacks.destroy', $quack->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm ml-2" style="float: right">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        @endif

                        <a class="btn btn-outline-primary btn-sm" style="float: right"
                           href="{{ route('quacks.edit', $quack->id) }}">
                            <i class="fas fa-edit"></i>
                            Edit
                        </a>

                        <h5 class="card-title"><strong>{{ $quack->duckname }}</strong></h5>
                        <p class="card-text">{{ $quack->content }}</p>
                        @if($quack->image != null)
                            <img src="{{ $quack->image }}" class="card-img-top" style="max-width: 50%" alt="...">
                        @endif
                        <p class="card-text text-right" style="font-size: smaller">

                        </p>
                    </div>

                    <div class="card-footer text-white bg-dark">
                        <a class="btn btn-primary btn-sm" style="float: right"
                           href="{{ route('quacks.show', $quack->id) }}">
                            <i class="fas fa-comment-alt"></i>
                            Reply
                        </a>
                        @if($quack->parent_id == null)
                            <a class="text-white" href="{{ route('quacks.show', $quack->id) }}">
                                <i class="far fa-comment-alt"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
