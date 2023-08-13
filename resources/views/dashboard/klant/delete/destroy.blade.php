<form action="{{ route('dashboard.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this client?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger-rgba">
        Delete <i class="feather icon-trash"></i>
    </button>
</form>
