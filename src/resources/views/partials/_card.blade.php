<div class="container-fluid">
    <div class="row justify-content-md-left">
        <div class="col-12 col-md-12 col-lg-12">
            @if (Session::has('message'))
                @include('admin::partials.utils._success')
            @endif
                @include('admin::partials.utils._errors')
            <div class="card" style="margin-top: 1rem;">
                <h4 class="card-header">
                    {{ $header }}
                </h4>
                <div class="card-body">
                    {{ $body }}
                </div>
            </div>
        </div>
    </div>
</div>
