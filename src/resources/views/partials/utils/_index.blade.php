@if($search['show'])
    <div class="row">
        <div class="col-md-9">
            @include('admin::partials.forms._search', ['search'=> $search])
            <p class="subtle float-right mt-2">Displaying {!! $items->firstItem() !!} - {!! $items->lastItem() !!} of  {!! $items->total() !!} total</p>
            @if(!empty($search['string']))
                <a href="{{ url($resource_route) }}">Clear Search</a>
            @endif
        </div>
        <div class="col-md-2 text-right">
            @if(Gate::check($permissions['create']))
                @include('partials._create_button', ['button' => $create_button])
            @endcan
        </div>
    </div>
@endif
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
            <tr>
                @foreach($columns as $key => $column)
                    <td data-column="{{ $column['column'] }}">
                        @if(isset($column['link']))
                            @if(isset($column['link']) && isset($column['link']['resource_route']))
                                <a href="{{ url($column['link']['resource_route'] . '/' . $item->{$column['link']['id_column']} ) }}">{{ $item->{$column['column']}  }}</a>
                            @endif
                        @else
                            {!! $item->{$column['column']}  !!}
                        @endif
                    </td>
                @endforeach
                <td>
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-2" role="group" aria-label="First group">
                            @if(Gate::check($permissions['update']) && $show_update)
                                <a href="{{ url( $resource_route . '/' . $item->id . '/edit' ) }}" class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i></a>
                            @endif
                            @if(Gate::check($permissions['delete']) && $show_delete)
                                @include('admin::partials.buttons._delete_button', [
                                    'route'         => $resource_route . '/' . $item->id,
                                    'text'   => '',
                                    'icon' => '<i class="fa fa-trash"></i>'
                                ])
                            @endif
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="table-footer">
    {!! $items->appends(['sortBy' => $sort_by, 'order' => $order])->render() !!}
</div>
