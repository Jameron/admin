@extends('admin::layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card text-center" style="margin-top: 5rem;">
                <h4 class="card-header">
                    Settings
                </h4>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text"></p>
                    @include('admin::partials.utils._success')
                    <form action="/settings" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @include('admin::partials.forms.settings', ['submitButtonText' => 'Update', 'mode'=>'edit'])
                    </form>
                    @include('admin::partials.utils._errors')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
