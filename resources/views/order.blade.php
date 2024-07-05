@extends('layout.main')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">About Orders List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            @if (auth()->user()->level == "admin" || auth()->user()->level == "manager")

            {{-- <a href="{{ route('create.destination') }}" class="btn btn-primary mb-3">Add Data</a> --}}

            @endif
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">List of Orders Data</h3>

                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Destination</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        {{-- <th>Status</th> --}}
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->destination->title }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->total_price }}</td>
                            {{-- <td>{{ $order->status }}</td> --}}
                            <td>
                                <!-- Add buttons or links for actions (e.g., view, edit, delete) -->
                                <a href="#" class="btn btn-info btn-sm">View</a>
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
