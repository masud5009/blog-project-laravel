@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create post</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post List</a></li>
                        <li class="breadcrumb-item active">Create post</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Create Post</h3>
                                <a href="{{ route('post.index') }}" class="btn btn-primary">Go Back to Post List</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-12 col-md-8 offset-md-2 offset-lg-0">
                                    <!-- form start -->
                                    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="title"> Post Title</label>
                                                        <input type="text" name="title" value="{{ old('title') }}"
                                                            class="form-control" placeholder="Enter title">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="category">Select Category</label>
                                                        <select name="category" id="category" class="form-control">
                                                            @foreach ($categories as $category)
                                                                <option value="" selected style="display: none">Select
                                                                    Category</option>
                                                                <option value="{{ $category->id }}">{{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="image">Post Image</label>
                                                        <div class="custom-file">
                                                            <input type="file" name="image" class="custom-file-input"
                                                                id="image">
                                                            <label class="custom-file-label" for="customFile">Choose
                                                                file</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Choose Post Tags</label>
                                                        <div class="d-flex flex-wrap">
                                                            @foreach ($tags as $tag)
                                                                <div class="custom-control custom-checkbox"
                                                                    style="margin-right: 20px">
                                                                    <input class="custom-control-input" type="checkbox"
                                                                        name="tags[]" id="tag{{ $tag->id }}"
                                                                        value="{{ $tag->id }}">

                                                                    <label for="tag{{ $tag->id }}"
                                                                        class="custom-control-label">{{ $tag->name }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <textarea class="form-control" id="summernote" name="description" rows="6" placeholder="Enter description"
                                                            style="height: 90px;">{{ old('description') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- /.card-body -->
                                        <button type="submit" class="btn btn-primary">Create post</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
