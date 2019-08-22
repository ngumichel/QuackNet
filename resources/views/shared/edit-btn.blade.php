@if(Gate::allows('update-quack', $quack))
    <a class="btn btn-outline-primary btn-sm mr-2" style="float: right" href="{{ route('quacks.edit', $quack) }}">
        <i class="fas fa-edit"></i>
        Edit
    </a>
@endif
