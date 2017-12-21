<th data-column="{{ $column }}">
	@if($column==$sort_by && $order=='desc')
        <a href="#" class="btn-sort"><span><i class="fa fa-angle-up" aria-hidden="true" onclick="document.getElementById('sort_by').value='{{$column}}';document.getElementById('order').value='asc';document.getElementById('{{ $form_id or '' }}').submit();"></i> </span></a>
	@elseif($column==$sort_by && $order=='asc')
        <a href="#" class="btn-sorted"><span><i class="fa fa-angle-down" aria-hidden="true" onclick="document.getElementById('sort_by').value='{{$column}}';document.getElementById('order').value='desc';document.getElementById('{{ $form_id or '' }}').submit();"></i></span></a>
	@endif
	@if($column==$sort_by && $order=='desc')
	<span class="sort-title"><a href="#" class="btn-sort" onclick="document.getElementById('sort_by').value='{{$column}}';document.getElementById('order').value='asc';document.getElementById('{{ $form_id or '' }}').submit();">{{ $th }}</a></span>
	@elseif($column==$sort_by && $order=='asc')
	<span class="sort-title"><a href="#" class="btn-sort" onclick="document.getElementById('sort_by').value='{{$column}}';document.getElementById('order').value='desc';document.getElementById('{{ $form_id or '' }}').submit();">{{ $th }}</a></span>
	@else
	<span class="sort-title"><a href="#" class="btn-sort" onclick="document.getElementById('sort_by').value='{{$column}}';document.getElementById('order').value='asc';document.getElementById('{{ $form_id or '' }}').submit();">{{ $th }}</a></span>
	@endif
</th>
