@extends('layout.main')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">About Destination</h1>
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

            <a href="{{ route('create.destination') }}" class="btn btn-primary mb-3">Add Data</a>

            @endif
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">List of destination Data</h3>

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
                        <th>Image</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Content</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('storage/image-destination/'.$d->image) }}" alt="" width="100"></td>
                            <td>{{ $d->title }}</td>
                            <td>{{ $d->price }}</td>
                            <td>{{ $d->content }}</td>
                            <td>{{ $d->status }}</td>
                            @if (auth()->user()->level == "admin" || auth()->user()->level == "manager")
                            <td>
                                <a href="{{ route('destination.edit',['id' => $d->id]) }}" class="btn btn-info"><i class=" fas fa-pen"></i> Edit</a>
                                <a data-toggle="modal" data-target="#modal-delete{{ $d->id }}" class="btn btn-danger"><i class=" fas fa-trash-alt"></i> Delete</a>
                            </td>
                            @endif
                          </tr>
                          <div class="modal fade" id="modal-delete{{ $d->id }}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Confirm</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>Are you sure you will delete this data?. <b>{{ $d->title }}</b></p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <form action="{{ route('destination.delete',['id' => $d->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary">Yes, i'm sure</button>
                                  </form>
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>
                          <!-- /.modal -->

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
