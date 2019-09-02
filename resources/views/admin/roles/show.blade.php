@extends('admin.panel')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{strtoupper($role->name)}}</div>

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

                    <form method="POST" action="{{ route('admin.edit.role', ['id' => $role->id]) }}" id="edit-form-roles">
                        {!! csrf_field() !!}
                        {!! method_field('PUT') !!}

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input class="form-control enabled-disabled" type="text" name="name"  value="{{ strtoupper($role->name) }}" placeholder="Name" disabled/>
                                </div>
                            </div>
                            <div class="col">
                                <div>
                                    <select multiple class="form-control enabled-disabled" id="rolesSelect" name="permissions[]" disabled>
                                        @foreach($permissions as $permission)
                                            <option <?php $role->hasPermissionTo($permission->name) ? print('selected') : print(' ') ?> value="{{ $permission->name }}">{{ $permission->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col submit-btn-roles">
                                <button type="submit" class="btn btn-primary submit-edit-btn enabled-disabled" disabled>Submit</button>
                            </div>
                        </div>
                        <div class="row info-row">
                            <div class="col">
                                <h4>Roles:</h4>
                                @foreach($role->permissions as $permission)
                                    <p>{{ $permission->name }}</p>
                                @endforeach
                            </div>
                            <div class="col">
                                <h5>Created at:</h1>
                                <p>{{ $role->created_at }}</p>
                                <h5>Updated at:</h1>
                                <p>{{ $role->updated_at }}</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="block-button">
                <button type="button" class="btn btn-success btn-lg btn-block" id="edit-button">Edit Role</button>
                <form action="{{ route('admin.delete.role', ['id' => $role->id]) }}" method="POST" id="delete-form-roles-2">
                    {!! csrf_field() !!}
                    {!! method_field('DELETE') !!}
                    <button type="submit" class="btn btn-danger btn-lg btn-block">Delete Role</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
