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
                        <div class="custom-media btn btn-block btn-outline-primary mb-2" style="border-width: 2px">
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
                    @include('shared.delete-btn', ['og_quack' => $quack])
                    @include('shared.edit-btn')
                    <h5 class="card-title"><strong>{{ $quack->duck->duckname }}</strong></h5>
                    <p class="card-text" onclick="{{ route('quacks.show', $quack) }}">{{ $quack->content }}</p>
                    @if($quack->image != null)
                        <img src="{{ $quack->image }}" class="card-img-top" style="max-width: 50%" alt="...">
                    @endif
                    <p class="card-text text-right" style="font-size: smaller">
                        @include('shared.timestamp')
                    </p>
                </div>

                <div class="card-footer text-white bg-dark">
                    <a class="btn btn-primary btn-sm" style="float: right" href="{{ route('quacks.show', $quack) }}">
                        <i class="fas fa-comment-alt"></i>
                        Reply
                    </a>
                    <a class="text-white" href="{{ route('quacks.show', $quack) }}">
                        <i class="far fa-comment-alt"></i>
                        {{ $quack->children_count }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach
