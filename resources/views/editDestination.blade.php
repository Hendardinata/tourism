@extends('layout.main')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Destination</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Destination</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('destination.update',['id' => $data->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                      <!-- general form elements -->
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Form Edit Destination</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Image</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Image" name="image" value="{{ $data->image }}">
                                        @error('image')
                                            <small>{{ $message }}</small>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Title" name="title" value="{{ $data->title }}">
                                        @error('title')
                                            <small>{{ $message }}</small>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Price</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Price" name="price" value="{{ $data->price }}">
                                        @error('price')
                                            <small>{{ $message }}</small>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Content</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Content" name="content" value="{{ $data->content }}">
                                        @error('content')
                                            <small>{{ $message }}</small>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Status</label>
                                    <select class="form-control select2" style="width: 100%;" name="status" value="{{ $data->status }}">
                                        <option selected="selected" value="open">Open</option>
                                        <option value="close">Close</option>
                                      </select>
                                        @error('status')
                                            <small>{{ $message }}</small>
                                        @enderror
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
