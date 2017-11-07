@if (Session::has('success_message'))
	<div class="alert alert-success" id='successMessage'>
		<ul>
            <li>{{ Session::get('success_message') }}</li>
		</ul>
	</div>
@endif
