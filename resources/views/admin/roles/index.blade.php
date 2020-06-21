@extends('admin.layouts.app')
@section('page-name', 'Role')
@section('roles', 'active')
@section('content')
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">--}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        #outer {
            width: 100%;
            text-align: center;
        }

        .inner {
            display: inline-block;

        }
    </style>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Roles</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content" style="margin-left: 10px; margin-right: 10px;">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title float-left">
                    Roles
                </h3>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <table class="table projects">
                    <thead>
                    <tr>
                        <th>Sn</th>
                        <th>Name</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <div id="outer">
                                    <a class="btn btn-sm inner" href="{{ route('roles.show',$role->id) }}"
                                       style="color: royalblue;"><i
                                                class="fa fa-eye" title="View"></i></a>
                                    @can('role-edit')
                                        <a class="btn btn-sm" style="color: royalblue;"
                                           href="{{ route('roles.edit',$role->id) }}"><i class="fas fa-edit"
                                                                                         title="Edit"></i></a>
                                    @endcan
                                    <form action="{{route('roles.destroy', $role->id)}}" method="POST" class="inner">
                                        @csrf
                                        @method('DELETE')
                                        @can('role-delete')
                                            <button value="submit" class="btn btn-sm" style="color: red;"><i
                                                        class="fas fa-trash" title="Delete"></i></button>
                                        @endcan
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>


                @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif
    </script>
    {{--{!! $roles->render() !!}--}}
@endsection