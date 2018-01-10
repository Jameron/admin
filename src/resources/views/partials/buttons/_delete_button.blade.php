<form action="{{ url($route)}}" method="POST" class="float-right">
    <input type="hidden" name="_method" value="DELETE"> 
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-sm btn-danger" onclick="if (!confirm('Are you sure want to delete this item?')) { return false }">{!! $icon !!}<span>{{ $text }}</span></button>
</form>
