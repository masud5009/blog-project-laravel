@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Users List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Users</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Users List</h3>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th style="width: 40px">Action</th>
                          </tr>
                        </thead>
                        <tbody>

                          @if($users->count())
                          @php
                              $count = 1;
                          @endphp
                          @foreach ($users as $user)
                          @if($user->role != 1)
                          <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="d-flex">
                              <a href="" class="btn btn-primary mr-1 btn-sm"><i class="fas fa-edit"></i></a>
                              <form action="" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger mr-1 btn-sm" type="submit"><i class="fas fa-trash"></i></button>
                              </form>
                              {{-- <a href="{{ route('category.show',[$category->id])}}" class="btn btn-success mr-1 btn-sm"><i class="fas fa-eye"></i></a> --}}
                            </td>
                          </tr>
                          @endif
                          @endforeach
                          @else
                          <tr>
                            <td colspan="5">
                              <h5 class="text-center">No subscribers found</h5>
                            </td>
                          </tr>
                          @endif
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
            </div>
          </div>
        </div>
    </div>

    <!--Table-->

@endsection
