@extends('layouts.app')
@section('title')
    Quack Reply
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-8 m-3 p-0">
                <div class="card-body pb-1">
                    @include('shared.delete-btn', ['og_quack' => $quack])
                    @include('shared.edit-btn')
                    <h5 class="card-title"><strong>{{ $quack->duck->duckname }}</strong></h5>
                    <p class="card-text">{{ $quack->content }}</p>
                    @if($quack->image != null)
                        <img src="{{ $quack->image }}" class="card-img-top" style="max-width: 50%" alt="...">
                    @endif
                    <p class="card-text text-right" style="font-size: smaller">
                        @include('shared.timestamp')
                    </p>
                </div>

                @if($quack->children->count() != 0)
                    <div class="card-footer ">
                        @foreach($quack->children as $qck)

                            @auth
                                @if($qck->duck_id == $duck->id)
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
                                                                        @include('shared.delete-btn', ['quack' => $qck, 'og_quack' => $quack])
                                                                        @include('shared.edit-btn', ['quack' => $qck])
                                                                        <h5 class="card-title">
                                                                            <strong>{{ $qck->duck->duckname }}</strong>
                                                                        </h5>
                                                                        <p class="card-text">{{ $qck->content }}</p>
                                                                        @if($qck->image != null)
                                                                            <img src="{{ $qck->image }}"
                                                                                 class="card-img-top"
                                                                                 style="max-width: 50%" alt="...">
                                                                        @endif
                                                                        <p class="card-text text-right"
                                                                           style="font-size: smaller">
                                                                            @include('shared.timestamp', ['quack' => $qck])
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
                                                                  action="{{ route('quacks.store') }}">
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
