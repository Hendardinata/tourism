@extends('layout.main')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('user.update',['id' => $data->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                      <!-- general form elements -->
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Form Edit User</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value="{{ $data->email }}">
                                    @error('email')
                                        <small>{{ $message }}</small>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="name" value="{{ $data->name }}">
                                    @error('name')
                                        <small>{{ $message }}</small>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="levelSelect">Level</label>
                                <select class="form-control" id="levelSelect" name="level">
                                    <option value="admin" {{ $data->level == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="manager" {{ $data->level == 'manager' ? 'selected' : '' }}>Manager</option>
                                    <option value="client" {{ $data->level == 'client' ? 'selected' : '' }}>Client</option>
                                    <option value="user" {{ $data->level == 'user' ? 'selected' : '' }}>User</option>
                                </select>
                                @error('level')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                                    @error('password')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                    <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                  </div>
            </form>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>

  </div>

@endsection
