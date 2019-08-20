@if($duck)
    <div class="container">
        <div class="row justify-content-center">
            <form class="form col-8 pl-0 pr-0 " method="POST" action="{{ route('quacks.store') }}">
                @csrf
                <div class="row align-items-center">
                    <div class="form-group col-10">
                        <textarea class="form-control" id="content" name="content" rows="3"
                                  placeholder="publish something..."></textarea>
                    </div>
                    <div class="form-group col-2 text-center align-items-center">
                        <div class="custom-media btn btn-block btn-outline-primary mb-2">
                            <i class="fas fa-upload"></i> Media
                            <input type="file" class="form-control-file custom-input" id="image" name="image">
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-block btn-primary">Publish</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endif

@foreach($quacks as $quack)
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-8 m-3 p-0">
                <div class="card-body pb-1">
                    @if($duck)
                        @if($quack->duck->id == $duck->id)
                            <a class="btn btn-outline-primary btn-sm" style="float: right"
                               href="{{ route('quacks.edit', $quack) }}">
                                <i class="fas fa-edit"></i>
                                Edit
                            </a>
                        @endif
                    @endif
                    <h5 class="card-title"><strong>{{ $quack->duck->duckname }}</strong></h5>
                    <p class="card-text">{{ $quack->content }}</p>
                    @if($quack->image != null)
                        <img src="{{ $quack->image }}" class="card-img-top" style="max-width: 50%" alt="...">
                    @endif

                    <p class="card-text text-right" style="font-size: smaller">
                        @if($quack->created_at == $quack->updated_at)
                            created at {{ $quack->created_at }}
                        @else
                            updated at {{ $quack->updated_at }}
                        @endif
                    </p>
                </div>

                <div class="card-footer text-white bg-dark">
                    @if($duck)
                        @if($quack->duck->id == $duck->id)
                            <form class="form" action="{{ route('quacks.destroy', $quack) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm ml-2" style="float: right">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        @endif
                        <a class="btn btn-primary btn-sm" style="float: right"
                           href="{{ route('reply.create', $quack) }}">
                            <i class="fas fa-comment-alt"></i>
                            Reply
                        </a>
                    @endif
                    <a class="text-white" href="@if($duck)
                    {{ route('reply.create', $quack) }}
                    @else
                    {{ route('quacks.show', $quack) }}
                    @endif">
                        <i class="far fa-comment-alt"></i>
                        {{ $quack->replies->count() }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach
