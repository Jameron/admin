<form action="{{ $search['route'] }}" method="GET" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row">
        <div class="col-md-9">
            <label class="sr-only" for="inlineFormInputName2">Search</label>
            <div class="input-group">
                <input type="text" name="search_string" class="form-control @if(config('admin.theme')=='dark')form-control-dark @endif col-md-12" placeholder="{{ $search['placeholder'] }}" aria-label="Search for..." value="@if($search['string']){{ ($search['string']) }}@endif">
                <span class="input-group-btn">
                    <button class="btn btn-secondary" type="submit">@if(isset($search['icon']))<i class="fa fa-{{ $search['icon']}}" aria-hidden="true"></i>@endif {{$search['button_text']}}</button>
                </span>
            </div>
            <div class="float-right mt-2">
                <p class="subtle ">Displaying {!! $items->firstItem() !!} - {!! $items->lastItem() !!} of  {!! $items->total() !!} total</p>
                @if(isset($search['string']) && !empty($search['string']) || $is_advanced_search)
                    <a href="{{ url($resource_route) }}">Clear Search</a>
                @endif
            </div>
            @if(isset($advanced_search) && $advanced_search['show'])
                <a data-toggle="collapse" href="#collapseExample" aria-expanded="{{ ($is_advanced_search) ? 'false' : 'true' }}" aria-controls="collapseExample" class="btn btn-secondary btn-sm mt-2 mb-4" id="toggleAdvanced">
                    Advanced Search
                </a>
            @endif
        </div>
        <div class="col-md-2 text-right">
            @if(Gate::check($permissions['create']))
                @include('partials._create_button', ['button' => $create_button])
            @endcan
        </div>
    </div>
    @if(isset($advanced_search) && $advanced_search['show'])
        <div class="row">
            <div class="col-md-12">
                <div class="collapse {{ ($is_advanced_search) ? 'show' : '' }}" id="collapseExample">
                    @include('partials.forms._advanced_search')
                </div>
            </div>
        </div>
    @endif
</form>
