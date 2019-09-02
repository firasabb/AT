@extends('layouts.panel')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Roles</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <tr>
                            <th scope="col">
                                ID
                            </th>
                            <th scope="col">
                                Name
                            </th>
                            <th>
                                Permissions
                            </th>
                            <th scope="col">
                                Actions
                            </th>   
                        </tr>
                        @foreach ($roles as $role)
                            <tr>
                                <td>
                                    {{$role->id}}
                                </td>
                                <td>
                                    {{ strtoupper($role->name) }}
                                </td>
                                <td>
                                    @foreach($role->permissions as $permission)
                                        {{ $permission->name }} <br>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('admin.show.role', ['id' => $role->id]) }}" class="btn btn-success">Show/Edit</a>
                                    <form action="{{ route('admin.delete.role', ['id' => $role->id]) }}" method="POST" id="delete-form-roles-1">
                                        {!! csrf_field() !!}
                                        {!! method_field('DELETE') !!}
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $roles->links() }}
                </div>
            </div>
            <div class="block-button">
                <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#addModal">Add Role</button>
            </div>

            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form method="POST" action="{{ route('admin.add.role') }}">
                            {!! csrf_field() !!}
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Role</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="name"  value="{{ old('name') }}" placeholder="Name" />
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <select multiple class="form-control" id="permissionsSelect" name="permissions[]">
                                            @foreach($permissions as $permission)
                                                <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button name="action" type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
