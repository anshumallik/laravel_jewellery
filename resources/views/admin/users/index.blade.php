@extends('admin.layouts.app')
@section('page-name', 'User')
@section('user', 'active')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <style>
        #outer {
            width: 100%;
            text-align: center;
        }

        .inner {
            display: inline-block;

        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content" style="margin-left: 10px;">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title float-left">
                    User
                </h3>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <table id="user" class="table user">
                    <thead>
                    <tr>
                        <th>Sn</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $key => $user)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $v)
                                        <label class="badge badge-success">{{ $v }}</label>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                <div id="outer">
                                    <a class="btn btn-sm inner" style="color: royalblue"
                                       href="{{ route('users.show',$user->id) }}"><i
                                                class="fas fa-eye" title="View"></i></a>
                                    <a class="btn btn-sm inner" style="color: royalblue"
                                       href="{{ route('users.edit',$user->id) }}"><i
                                                class="fas fa-edit" title="Edit"></i></a>
                                    <form action="{{route('users.destroy', $user->id)}}" method="POST" class="inner">
                                        @csrf
                                        @method('DELETE')
                                        <button value="submit" class="btn btn-sm" style="color: red;"><i
                                                    class="fas fa-trash" title="Delete"></i></button>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>


        $("#user").DataTable();

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
@endsection