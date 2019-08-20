@extends('layouts.app')
@section('title')
    Quack Reply
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
                    <p class="card-text text-right" style="font-size: smaller">{{ $quack->created_at }}</p>
                </div>

                @if($quacks->count() != 0)
                    <div class="card-footer">
                        @foreach($quacks as $qck)
                            <div class="card col-8 text-white bg-dark m-3 p-0">
                                <div class="card-body pb-1">
                                    @if($duck)
                                        @if($qck->duck->id == $duck->id || $quack->duck_id == $duck->id)
                                            <form class="form" action="{{ route('reply.destroy', $qck) }}"
                                                  method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm"
                                                        style="float: right">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                            <a class="btn btn-outline-primary btn-sm mr-2" style="float: right"
                                               href="{{ route('quacks.edit', $qck) }}">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                            </a>
                                        @endif
                                    @endif
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

                <div class="card-footer text-white bg-dark">
                    <form class="form pl-0 pr-0 pb-2 pt-2" method="POST" action="{{ route('reply.store', $quack) }}">
                        @csrf
                        <input type="hidden" name="reply_id" value="{{ $quack->id }}">
                        <div class="row align-items-center">
                            <div class="form-group col-10 m-0">
                                <textarea class="form-control" id="content" name="content" rows="3"
                                          placeholder="leave a reply..."></textarea>
                            </div>
                            <div class="form-group col-2 m-0 text-center align-items-center">
                                <div class="custom-media btn btn-block btn-outline-primary mb-2">
                                    <i class="fas fa-upload"></i> Media
                                    <input type="file" class="form-control-file custom-input" id="image" name="image">
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-block btn-primary">Reply</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
