@extends('layouts.panel')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$category->name}}</div>

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

                    <form method="POST" action="{{ route('admin.edit.category', ['id' => $category->id]) }}" id="edit-form-categories" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        {!! method_field('PUT') !!}

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input class="form-control enabled-disabled" type="text" name="name"  value="{{ $category->name }}" placeholder="Name" disabled/>
                                </div>
                            </div>
                            <div class="col">
                                <div>
                                    <input class="form-control enabled-disabled" type="text" name="url"  value="{{ $category->url }}" placeholder="Url" disabled/>
                                </div>
                            </div>
                            <div class="col">
                                <div>
                                    <input class="enabled-disabled" type="file" name="featured" disabled/>
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
                                <h5>Created at:</h1>
                                <p>{{ $category->created_at }}</p>
                                <h5>Updated at:</h1>
                                <p>{{ $category->updated_at }}</p>
                            </div>
                            @if(!empty($category->medias->first()))
                                <div class="col">
                                    <img class="img-thumbnail" src="{{ $category->medias->first()->public_url }}">
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            <div class="block-button">
                <button type="button" class="btn btn-success btn-lg btn-block" id="edit-button">Edit Cateogry</button>
                <form action="{{ route('admin.delete.category', ['id' => $category->id]) }}" method="POST" id="delete-form-categories" class="delete-form-2">
                    {!! csrf_field() !!}
                    {!! method_field('DELETE') !!}
                    <button type="submit" class="btn btn-danger btn-lg btn-block">Delete Cateogry</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
