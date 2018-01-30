@if (Session::has('success_message'))
<div class="alert alert-success alert-dismissible fade show" role="alert" id='successMessage'>
    <strong>Success!</strong> {{ Session::get('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
	</div>
@endif
