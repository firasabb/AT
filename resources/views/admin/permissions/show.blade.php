@extends('admin.panel')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$permission->name}}</div>

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

                    <form method="POST" action="{{ route('admin.edit.permission', ['id' => $permission->id]) }}" id="edit-form-permissions">
                        {!! csrf_field() !!}
                        {!! method_field('PUT') !!}

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input class="form-control enabled-disabled" type="text" name="name"  value="{{ $permission->name }}" placeholder="Name" disabled/>
                                </div>
                            </div>
                            <div class="col">
                                <div>
                                    <select multiple class="form-control enabled-disabled" id="usersSelect" name="roles[]" disabled>
                                        @foreach($roles as $role)
                                            <option <?php $permission->hasRole($role->name) ? print('selected') : print(' ')  ?> value="{{ $role->name }}">{{ $role->name }}</option>
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
                                @foreach($permission->roles as $role)
                                    <p> {{ strtoupper($role->name) }} </p>
                                @endforeach
                            </div>
                            <div class="col">
                                <h5>Created at:</h1>
                                <p>{{ $permission->created_at }}</p>
                                <h5>Updated at:</h1>
                                <p>{{ $permission->updated_at }}</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="block-button">
                <button type="button" class="btn btn-success btn-lg btn-block" id="edit-button">Edit Permission</button>
                <form action="{{ route('admin.delete.permission', ['id' => $permission->id]) }}" method="POST" id="delete-form-permissions-2">
                    {!! csrf_field() !!}
                    {!! method_field('DELETE') !!}
                    <button type="submit" class="btn btn-danger btn-lg btn-block">Delete Permission</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
