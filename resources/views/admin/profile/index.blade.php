@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit profile</li>
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
                                <h3 class="card-title">Profile</h3>
                                <a href="{{ route('admin.index') }}" class="btn btn-primary">Go Back to dashboard</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-12 col-md-8 offset-md-2 offset-lg-0">
                                    <!-- form start -->
                                    <form action="{{ route('admin.update', $user->id) }}" method="post"
                                        enctype="multipart/form-data" class="form-horizontal">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <div class="form-group row">
                                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="name" class="form-control" name="name"
                                                            value="{{ $user->name }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" name="email"
                                                            value="{{ $user->email }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="image" class="col-sm-2 col-form-label">Post Image</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" name="image" class="custom-file-input"
                                                            id="image">
                                                        <label class="custom-file-label" for="customFile">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="about" class="col-sm-2 col-form-label">About your
                                                        self</label>
                                                    <div class="col-sm-10">
                                                        <textarea name="description" rows="3" class="form-control">{{ $user->description }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">

                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <img class="profile-user-img img-fluid img-circle"
                                                            src="{{ asset('public/storage/user/' . $user->image) }}"
                                                            alt="{{ $user->name }}">
                                                    </div>
                                                    <h3 class="profile-username text-center">{{ $user->name }}</h3>
                                                    <p class="text-muted text-center">{{ $user->description }}</p>
                                                </div>
                                                <!-- /.card-body -->

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-10">
                                                <button class="btn btn-success">Update now</button>
                                            </div>
                                        </div>
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
