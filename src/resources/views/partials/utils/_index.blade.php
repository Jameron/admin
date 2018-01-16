@if($search['show'])
    @include('admin::partials.forms._search', [
        'search'=> $search, 
        'advanced_search' => (isset($advanced_search)) ? $advanced_search : null,
        'is_advanced_search' => (isset($is_advanced_search)) ? $is_advanced_search : null,
        'permissions'=> (isset($permissions)) ? $permissions : null,
        'items' => (isset($items)) ? $items : null,
        'create_button' => (isset($create_button)) ? $create_button : null,
        'id'=>'systemsForm'
        ])
    @endif
    <div class="app-table-responsive">
<table class="table table-hover table-responsive table-striped">
    <thead>
        <tr>
            @foreach($columns as $key => $column)
                @include('admin::partials.utils._sortable_column', 
                [
                    'th' => $column['label'], 
                    'url' => url($resource_route . '?sortBy=' . $column['column'] . '&search=' . $search['string']), 
                    'column' => $column['column']
                    ])
                @endforeach
                @include('admin::partials.utils._sortable_column', 
                [
                    'th' => 'Option(s)', 
                    'url' => null, 
                    'column' => null 
                    ])
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
            <tr @if(isset($row_links) && $row_links['enabled']) class="clickable-row" data-href='{{ url($resource_route . '/' . $item->id )}}' @endif>
                @foreach($columns as $key => $column)
                    <td data-column="{{ $column['column'] }}">
                        @if(isset($column['link']))
                            @if(isset($column['link']) && isset($column['link']['resource_route']))
                                <a href="{{ url($column['link']['resource_route'] . '/' . $item->{$column['link']['id_column']} ) }}">{{ $item->{$column['column']}  }}</a>
                            @endif
                        @elseif(isset($column['related']))
                            {!! $item->{$column['column']}->{$column['related']['value_column']}  !!}
                        @else
                            {!! $item->{$column['column']}  !!}
                        @endif
                    </td>
                @endforeach
                <td>
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            @if(Gate::check($permissions['update']) && $show_update)
                                <a href="{{ url( $resource_route . '/' . $item->id . '/edit' ) }}" class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i></a>
                            @endif
                            @if(Gate::check($permissions['delete']) && $show_delete)
                                @include('admin::partials.buttons._delete_button', [
                                    'route'  => $resource_route . '/' . $item->id,
                                    'text'   => '',
                                    'icon'   => '<i class="fa fa-trash"></i>'
                                ])
                            @endif
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
<div class="table-footer">
        {!! $items->setPath($resource_route)->appends([
            'sort_by' => $sort_by, 
            'order' => $order, 
            'search_string'         => $search['string'],
            'system_price_min'      => (isset($system_price_min)) ? $system_price_min : null,
            'system_price_max'      => (isset($system_price_max)) ? $system_price_max : null,
            'contract_type'         => (isset($contract_type)) ? $contract_type : null,
            'contract_status'       => (isset($contract_status)) ? $contract_status : null,
            'utility'               => (isset($utility)) ? $utility : null,
            'system_size_min'       => (isset($system_size_min)) ? $system_size_min : null,
            'system_size_max'       => (isset($system_size_max)) ? $system_size_max : null,
            'energized_start_date'  => (isset($energized_start_date)) ? $energized_start_date : null,
            'energized_end_date'    => (isset($energized_end_date)) ? $energized_end_date : null
        ])->render() !!}
</div>
@if(isset($row_links) && $row_links['enabled']) 
@section('js')
<script>
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>
@endsection
@endif
