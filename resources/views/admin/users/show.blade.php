@extends('admin.layouts.app')
@section('page-name','show-user')
@section('user','active')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 mt-2">
                    <h5>Show User</h5>
                </div>
            </div>
        </div>
    </section>
    <section class="content" style="margin-left: 10px;">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title float-left">User Details</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $user->name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Roles:</strong>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="form-group text-center">
                    <a class="btn btn-primary btn-sm" style="" href="{{ route('users.index') }}">
                        Back</a>
                </div>
            </div>
        </div>
    </section>

@endsection