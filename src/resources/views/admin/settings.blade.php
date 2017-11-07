@extends('admin::layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Settings</div>
                <div class="panel-body">
                    @include('admin::partials.utils._success')
                    <form action="/admin/settings" method="POST">
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
