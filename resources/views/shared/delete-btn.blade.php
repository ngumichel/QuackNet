@if(Gate::allows('delete-quack', $quack) || Gate::allows('author-delete-quack', $og_quack))
    <form class="form" action="{{ route('quacks.destroy', $quack) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-danger btn-sm" style="float: right">
            <i class="fas fa-trash-alt"></i>
        </button>
    </form>
@endif
