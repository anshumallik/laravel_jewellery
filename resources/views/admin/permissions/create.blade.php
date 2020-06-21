@extends('admin.layouts.app')
@section('page-name', 'Create-Permission')
@section('permissions', 'active')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">
                                Add New Permission
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
                        {{ Form::open(array('url' => 'permissions')) }}
                        <div class="card-body">

                            <div class="form-group">
                                {{ Form::label('name', 'Name') }}
                                {{ Form::text('name', '', array('class' => 'form-control')) }}
                            </div>
                            <br>
                            @if(!$roles->isEmpty())
                                <h4>Assign Permission to Roles</h4>

                                @foreach ($roles as $role)
                                    {{ Form::checkbox('roles[]',  $role->id ) }}
                                    {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                                @endforeach
                            @endif
                            <br>
                        </div>
                        <div class="card-footer" style="text-align: center">
                            <button type="submit" class="btn btn-primary btn-sm">Add</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </section>






@endsection