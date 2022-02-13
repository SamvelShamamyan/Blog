 @extends('admin.layouts.main')

 @section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Post</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
               <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Posts</a></li>
              <li class="breadcrumb-item active">{{$post->title}}</li>
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
          
            <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PATCH')
               <div class="form-group w-25">
                    <label>Name</label>
                    <input type="text" name="title" value="{{ $post->title }}" class="form-control" placeholder="Post Name">
                    @error('title')
                      <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" id="summernote">{{ $post->content }}</textarea>
                    @error('content')
                      <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="form-group w-50">
                    <label for="exampleInputFile">Input Preview</label>
                    <div class="w-50 mb-3">
                      <img src="{{ url('storage/'. $post->preview_image) }}" alt="preview_image" class="w-50">
                    </div>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="preview_image" class="custom-file-input">
                        <label class="custom-file-label">Choose image</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                    @error('preview_image')
                      <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                  </div>
                   <div class="form-group w-50">
                    <label for="exampleInputFile">Input Image</label>
                    <div class="w-20 mb-2">
                      <img src="{{ url('storage/' . $post->main_image) }}" alt="main_image" class="w-50">
                    </div>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="main_image" class="custom-file-input">
                        <label class="custom-file-label">Choose image</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                    @error('main_image')
                      <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="form-group w-50">
                        <label>Choose Category</label>
                        <select class="form-control" name="category_id">
                          @foreach($categories as $category)
                          <option value="{{$category->id}}" 
                              {{ $category->id == $post->category_id ? 'selected' : '' }}>
                              {{$category->title}}</option>
                          @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Tags</label>
                  <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Choose Tags" style="width: 100%;">
                    @foreach($tags as $tag)

                    <option {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id,$post->tags->pluck('id')->toArray()) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>

                    @endforeach
                    
                  </select>
                 @error('tag_ids')
                  <div class="alert alert-danger">{{$message}}</div>
                @enderror
                </div>
                      </div>  
                  <input type="submit" class="btn btn-primary mb-3" value="Update">
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