 @extends('admin.layouts.main')

 @section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Post</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
               <li class="breadcrumb-item active"><a href="{{ route('admin.post.index') }}">Post</a></li>
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
          
            <form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group w-25">
                    <label>Name</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Post Name">
                    @error('title')
                      <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" id="summernote">{{ old('content') }}</textarea>
                    @error('content')
                      <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="form-group w-50">
                    <label for="exampleInputFile">Input Preview</label>
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
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="main_image" class="custom-file-input">
                        <label class="custom-file-label">Choose img</label>
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
                              {{ $category->id == old('category_id') ? 'selected' : '' }}>
                              {{$category->title}}</option>
                          @endforeach
                        </select>
                         @error('category_id')
                      <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                      </div>

                    <div class="form-group">
                      <label>Tags</label>
                        <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Choose Tags" style="width: 100%;">
                    @foreach($tags as $tag)
                 <option {{ is_array(old('tag_ids')) && in_array($tag->id,old('tag_ids')) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                  @endforeach
                        </select>
                 
                </div>
                @error('tag_ids')
                  <div class="alert alert-danger">{{$message}}</div>
                @enderror
                      </div>  

                  <div class="form-group">
                    <input type="submit" class="btn btn-primary mb-3" value="Add">
                  </div>
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