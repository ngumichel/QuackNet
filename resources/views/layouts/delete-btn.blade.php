<form class="form" action="{{ route('quacks.destroy', $quack) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-outline-danger btn-sm" style="float: right">
        <i class="fas fa-trash-alt"></i>
    </button>
</form>
