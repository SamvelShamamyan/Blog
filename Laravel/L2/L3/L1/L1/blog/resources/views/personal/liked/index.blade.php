 @extends('personal.layouts.main')

 @section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Liked</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        
        <div class="col-9">
            <div class="card">
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th colspan="3" class="text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($posts as $post)
                    <tr>
                      <td>{{$post->id}}</td>
                      <td>{{$post->title}}</td>
                      
                      <td class="text-center">
                        <a href="{{ route('admin.post.show', $post->id) }}"><i class="far fa-eye"></i></a>
                      </td>
              
                      <span><td><form action="{{ route('personal.liked.delete', $post->id) }}" method="POST">
  @csrf
  @method('DELETE')
                        
<button type="submit" class="text-danger border-0 bg-transparent" ><i class="fas fa-trash"></i></button>
    </form></td></span>

    </tr>
                    @endforeach
                  </tbody>
                </table>
          
        </div>
        <!-- /.row -->
      
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


  @endsection