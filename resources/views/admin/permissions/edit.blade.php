@extends('admin.layouts.app')
@section('page-name', 'Edit-Permission')
@section('permissions', 'active')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Permissions</h1>
                </div>

            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Edit Permission {{$permission->name}}
                            </h3>
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <p><strong>Opps Something went wrong</strong></p>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success" style="background-color: #0E9A00">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                        </div>
                        {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}
                        <div class="card-body">
                            <div class="form-group">
                                {{ Form::label('name', 'Permission Name') }}
                                {{ Form::text('name', null, array('class' => 'form-control')) }}
                            </div>
                            <br>
                        </div>
                        <div class="card-footer" style="text-align: center">
                            <a class="btn btn-primary btn-sm" style="" href="{{ route('permissions.index') }}">
                                Back</a>
                            <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
