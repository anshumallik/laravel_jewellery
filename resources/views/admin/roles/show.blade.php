@extends('admin.layouts.app')
@section('page-name', 'Show-Role')
@section('roles', 'active')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 mt-2">
                    <h5>Show Roles</h5>
                </div>
            </div>
        </div>
    </section>
    <section class="content" style="margin-left: 10px; margin-right: 10px;">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title float-left">Role Details</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $role->name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Permissions:</strong>
                            @if(!empty($rolePermissions))
                                @foreach($rolePermissions as $v)
                                    <label class="label label-success">{{ $v->name }},</label>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="form-group text-center">
                    <a class="btn btn-primary btn-sm" style="" href="{{ route('roles.index') }}">
                        Back</a>
                </div>
            </div>
        </div>
    </section>



@endsection