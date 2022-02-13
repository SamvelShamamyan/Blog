 @extends('admin.layouts.main')

 @section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{$user->name}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Users</a></li>
               <li class="breadcrumb-item active">{{$user->name}}</li>
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
          <div class="col-6 ">
            <div class="card">
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                 <thead>
                    <tr>
                      <th class="text-center">ID</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Email</th>
                      <th colspan="3" class="text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-center">{{$user->id}}</td>
                      <td class="text-center">{{$user->name}}</td>
                      <td class="text-center">{{$user->email}}</td>
                      <td class="text-center"><a href="{{ route('admin.user.edit', $user->id) }}"  class="text-success"><i class="fas fa-pencil-alt"></i></a></td>

<span><td><form action="{{ route('admin.user.delete', $user->id) }}" method="POST">
  @csrf
  @method('DELETE')
                        
<button type="submit" class="text-danger border-0 bg-transparent" ><i class="fas fa-trash"></i></button>
                      </form></td></span>
                    
                      
                    </tr>

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


  @endsection