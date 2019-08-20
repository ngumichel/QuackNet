@extends('layouts.app')
@section('title')
    Quack
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-8 m-3 p-0">
                <div class="card-body pb-1">
                    <h5 class="card-title"><strong>{{ $quack->duck->duckname }}</strong></h5>
                    <p class="card-text">{{ $quack->content }}</p>
                    @if($quack->image != null)
                        <img src="{{ $quack->image }}" class="card-img-top" style="max-width: 50%" alt="...">
                    @endif
                    <p class="card-text text-right" style="font-size: smaller">
                        @if($quack->created_at == $quack->updated_at)
                            {{ $quack->created_at }}
                        @else
                            {{ $quack->updated_at }}
                        @endif
                    </p>
                </div>
                @if($quacks->count() != 0)
                    <div class="card-footer">
                        @foreach($quacks as $qck)
                            <div class="card col-8 text-white bg-dark m-3 p-0">
                                <div class="card-body pb-1">
                                    <h5 class="card-title"><strong>{{ $qck->duck->duckname }}</strong></h5>
                                    <p class="card-text">{{ $qck->content }}</p>
                                    @if($qck->image != null)
                                        <img src="{{ $qck->image }}" class="card-img-top" style="max-width: 50%"
                                             alt="...">
                                    @endif
                                    <p class="card-text text-right"
                                       style="font-size: smaller">{{ $qck->created_at }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
