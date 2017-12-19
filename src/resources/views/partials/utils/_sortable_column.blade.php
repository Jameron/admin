<th data-column="{{ $column }}">
	@if($column==$sort_by && $order=='desc')
        <a href="{{ $url or '#' }}&order=asc#table" class="btn-sort"><span><i class="fa fa-angle-up" aria-hidden="true"></i> </span></a>
	@elseif($column==$sort_by && $order=='asc')
        <a href="{{ $url or '#' }}&order=desc#table" class="btn-sorted"><span><i class="fa fa-angle-down" aria-hidden="true"></i></span></a>
	@endif
	@if($column==$sort_by && $order=='desc')
	<span class="sort-title"><a href="{{ $url or '#' }}&order=asc#table" class="btn-sort">{{ $th }}</a></span>
	@elseif($column==$sort_by && $order=='asc')
	<span class="sort-title"><a href="{{ $url or '#' }}&order=desc#table" class="btn-sort">{{ $th }}</a></span>
	@else
	<span class="sort-title"><a href="{{ $url or '#' }}&order=asc#table" class="btn-sort">{{ $th }}</a></span>
	@endif
</th>
