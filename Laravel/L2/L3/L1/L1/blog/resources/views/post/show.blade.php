@extends('layouts.main')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{$post->title}}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">•{{$data->format('F')}} {{$data->day}}, {{$data->year}} • {{$data->format('H:i')}} • Featured • {{$post->comments->count()}} Comments</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{asset('storage/'.$post->preview_image) }}" alt="featured image" class="w-100" >
            </section>
            <section class="post-content">
               
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        {!! $post->content !!}
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    @if($relatedPosts->count() > 0)
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Related Posts</h2>
                        <div class="row">
                @foreach($relatedPosts as $relatedPost)
                            <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                <img src="{{asset('storage/'.$relatedPost->preview_image) }}" alt="related post" class="post-thumbnail">

                                <p class="post-category">{{ $relatedPost->category->title }}</p>
                                 <a href="{{route('post.show', $relatedPost->id)}}" class="blog-post-permalink">
                            
                            <h5 class="post-title">{{ $relatedPost->title }}</h5>
                                </a>
                            </div>
                @endforeach        
                            </div>
                        </div>
                @endif
                    </section>
                    <section>
                        
                    <form action=" {{ route('post.like.store', $post->id) }} " method="POST">
                        @csrf

                        <button type="submit" class="border-0 bg-transparent">
                        @auth
                         @if(auth()->user()->likedPosts->contains($post->id))
                            <i class="fas fa-heart"></i>
                          @else
                            <i class="far fa-heart"></i>
                           @endif
                        @endauth

                        </button>
                    </form>
                    </section>
<section class="user-list" style="width: 100%;">
    <div class="row">
        <div class="col-12">

<h3>Post Comments {{ $post->comments->count() }}</h3>
            <div class="card-footer card-comments">
                
                <div class="card-comment">
                @foreach($post->comments as $comment)
                  <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">

                  <div class="comment-text">
                    <span class="username">
                      {{ $comment->user->name }}
                      <span class="text-muted float-right">{{ $comment->dateAsCarbon->diffForHumans() }}</span>
                    </span>
                    <div>
                        {{ $comment->message }}
                    </div>
                    
                  </div>
                @endforeach
                </div>
                
              </div>

        </div>
    </div>
</section>
                    </section>

        @auth
                    <section class="comment-section" style="width: 100%;">
                        <h2 class="section-title mb-5" data-aos="fade-up">Leave a Reply</h2>
                        <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                <label for="comment" class="sr-only">Comment</label>
                                <textarea name="message" id="comment" class="form-control" placeholder="Comment" rows="10"></textarea>
                                </div>
<!-- <input type="hidden" name="post_id" value="{{ $post->id }}"> -->
                            </div>
                            
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Send Message" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
    @endauth
                </div>
            </div>
        </div>
    </main>

@endsection