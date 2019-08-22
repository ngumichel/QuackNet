@if($quack->created_at == $quack->updated_at)
    created {{ $quack->created_at->diffForHumans() }}
@else
    updated {{ $quack->updated_at->diffForHumans() }}
@endif
