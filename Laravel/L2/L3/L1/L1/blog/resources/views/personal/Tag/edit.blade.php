 @extends('admin.layouts.main')

 @section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Tag</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
               <li class="breadcrumb-item"><a href="{{ route('admin.tag.index') }}">Tags</a></li>
              <li class="breadcrumb-item active">{{$tag->title}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
          <div class="col-12">
          
            <form action="{{ route('admin.tag.update', $tag->id) }}" method="POST" class="w-25">
              @csrf
              @method('PATCH')
              <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="title" value="{{ $tag->title }}" class="form-control" placeholder="Categories Name">
                    @error('title')
                      <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <input type="submit" class="btn btn-primary" value="Update">
            </form>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


  @endsection