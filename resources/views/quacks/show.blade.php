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
                    <p class="card-text text-right" style="font-size: smaller">
                        @include('layouts.timestamp')
                    </p>
                </div>

                @if($quacks->count() != 0)
                    <div class="card-footer ">
                        @foreach($quacks as $quack)

                            @auth
                                @if($quack->duck_id == $duck->id)
                                    <div class="d-flex justify-content-end">
                                        <div class="card col-8 text-white bg-dark ml-0 mt-2 mb-2 p-0 ">
                                            @else
                                                <div class="d-flex justify-content-start">
                                                    <div class="card col-8 text-dark border-dark ml-0 mt-2 mb-2 p-0"
                                                         style="border-width: 2px">
                                                        @endif
                                                        @endauth

                                                        @guest
                                                            <div class="d-flex justify-content-start">
                                                                <div
                                                                    class="card col-8 text-dark border-dark ml-0 mt-2 mb-2 p-0"
                                                                    style="border-width: 2px">
                                                                    @endguest

                                                                    <div class="card-body pb-1">
                                                                        @if(Gate::allows('delete-quack', $quack) || Gate::allows('author-delete-quack', $this()))
                                                                            @include('layouts.delete-btn')
                                                                        @endif
                                                                        @if(Gate::allows('update-quack', $quack))
                                                                            @include('layouts.edit-btn')
                                                                        @endif
                                                                        <h5 class="card-title">
                                                                            <strong>{{ $quack->duck->duckname }}</strong>
                                                                        </h5>
                                                                        <p class="card-text">{{ $quack->content }}</p>
                                                                        @if($quack->image != null)
                                                                            <img src="{{ $quack->image }}"
                                                                                 class="card-img-top"
                                                                                 style="max-width: 50%" alt="...">
                                                                        @endif
                                                                        <p class="card-text text-right"
                                                                           style="font-size: smaller">
                                                                            @include('layouts.timestamp')
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @endforeach
                                                    </div>
                                                    @endif

                                                    @auth
                                                        <div class="card-footer text-white bg-dark">
                                                            <form class="form pl-0 pr-0 pb-2 pt-2" method="POST"
                                                                  action="{{ route('quacks.store', $quack) }}">
                                                                @csrf
                                                                <input type="hidden" name="reply_id"
                                                                       value="{{ $quack->id }}">
                                                                <div class="row align-items-center">
                                                                    <div class="form-group col-10 m-0">
                                                                        <textarea class="form-control" id="content"
                                                                                  name="content" rows="3"
                                                                                  placeholder="leave a reply..."></textarea>
                                                                    </div>
                                                                    <div
                                                                        class="form-group col-2 m-0 text-center align-items-center">
                                                                        <div
                                                                            class="custom-media btn btn-block btn-outline-primary mb-2"
                                                                            style="border-width: 2px">
                                                                            <i class="fas fa-upload"></i> Media
                                                                            <input type="file"
                                                                                   class="form-control-file custom-input"
                                                                                   id="image"
                                                                                   name="image">
                                                                        </div>
                                                                        <div class="mt-2">
                                                                            <button type="submit"
                                                                                    class="btn btn-block btn-primary">
                                                                                Reply
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    @endauth
                                                    @guest
                                                        <div class="card-footer text-white bg-dark">
                                                            <a class="btn btn-primary btn-sm" style="float: right"
                                                               href="{{ route('login') }}">
                                                                <i class="fas fa-comment-alt"></i>
                                                                Reply
                                                            </a>
                                                        </div>
                                                    @endguest
                                                </div>
                                        </div>
                                    </div>
                    </div>
@endsection
