@extends('admin::layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    @if(file_exists(base_path() . '/vendor/jameron/regulator/'))
                    <a href="{{ url('/admin/users') }}" class="btn btn-primary">Manage Users</a>
                    <a href="{{ url('/admin/roles') }}" class="btn btn-primary">Manage Roles</a>
                    <a href="{{ url('/admin/permissions') }}" class="btn btn-primary">Manage Permissions</a>                
                    @endif
                    @if(file_exists(base_path() . '/vendor/jameron/invitations/'))
                    <a href="{{ url('/admin/invitations') }}" class="btn btn-primary">Manage Invitations</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
