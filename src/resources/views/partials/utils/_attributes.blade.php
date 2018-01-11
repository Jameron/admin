<div class="row">
    <div class="col-8">
        <table class="table table-striped">
            <tr>
                <th colspan="2">
                    <h5>{{ $title }}</h5>
                </th>
            </tr>
            @foreach($attributes as $attribute => $value)
                <tr>
                    <td>{{ $attribute }}:</td>
                    <td>{{ $value }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
