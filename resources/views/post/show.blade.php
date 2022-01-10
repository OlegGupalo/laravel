@extends('layouts.main')

@section('title')
    {{$post->title}}
@endsection

@section('content')
	<main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{$post->title}}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200"> {{$date->translatedFormat('F') }} {{$date->day}}, {{$date->year}} • {{$date->format('H:i')}} • {{$post->comments->count()}} комментария</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{asset('storage/' . $post->main_image)}}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {!! $post->content !!}
                    </div>
                </div>
            </section>
            <section class="like-section">
                        <form action="" method="POST">
                            @csrf

                            <a href=""><i class="fas fa-heart"></i> Нравится</a>
                        </form>
                    </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Схожие посты</h2>
                        <div class="row">
                            @foreach($relatedPosts as $relatedPost)
                            <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                <img src="{{asset('storage/' . $relatedPost->main_image)}}" alt="related post" class="post-thumbnail">
                                <p class="post-category">{{$relatedPost->category->title}}</p>
                                <a href="{{route('post.show', $relatedPost->id)}}" class="blog-post-permalink">
                                    <h5 class="post-title">{{$relatedPost->title}}</h5>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </section>
                    
                    <section class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up">Оставьте комментарий</h2>
                        <form action="{{route('post.comment.store', $post->id)}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                <label for="comment" class="sr-only">Комментарий</label>
                                <textarea name="message" id="comment" class="form-control" placeholder="Comment" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Отправить" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                    <div id="app">
                        <example-component></example-component>
                    </div>
                    @foreach($post->comments as $comment)
                      <div class="comment-text mb-5">
                        <span class="username">
                          <p>  
                            <b>

                            {{$comment->user->name}}
                            </b>
                          </p>
                          <span class="text-muted float-right">{{$comment->getCarbonDate()->diffForHumans()}}</span>
                        </span>
                        <!-- /.username -->
                        {{$comment->message}}
                      </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection