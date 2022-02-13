 @extends('admin.layouts.main')

 @section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Posts</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
              <li class="breadcrumb-item active">Posts</li>
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
        <div class="row">
           <div class="col-1 mb-3">
             <a href="{{ route('admin.post.create') }}" class="btn btn-block btn-primary">Add</a>
           </div>
         </div>
         <div class="row">
          <div class="col-9">
            <div class="card">
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>IMG</th>
                      <th colspan="3" class="text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($posts as $post)
                    <tr>
                      <td>{{$post->id}}</td>
                      <td>{{$post->title}}</td>
                      <td><img src="{{ url('storage/'. $post->preview_image) }}" style="width: 30%;" alt="preview_image" class="w-10"></td>
                      <td class="text-center"><a href="{{ route('admin.post.show', $post->id) }}"><i class="far fa-eye"></i></a></td>
                      <td class="text-center"><a href="{{ route('admin.post.edit', $post->id) }}"  class="text-success"><i class="fas fa-pencil-alt"></i></a></td>

<span><td><form action="{{ route('admin.post.delete', $post->id) }}" method="POST">
  @csrf
  @method('DELETE')
                        
<button type="submit" class="text-danger border-0 bg-transparent" ><i class="fas fa-trash"></i></button>
                      </form></td></span>
                    
                      
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

          </div>
          <!-- ./col -->



        </div>
        <!-- /.row -->
      
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<section>
  <div class="container">
    <div class="row">
        <div class="mx-auto" style="margin-top:-100px;">
                 {{$posts->links()}}
             </div> 
    </div>

  </div>
</section>
  @endsection
