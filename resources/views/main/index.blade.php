@extends('layouts.main')
@section('title')
	Рофлстак
@endsection

@section('content')
<main class="blog">
	<div class="container">
	    <h1 class="edica-page-title" data-aos="fade-up">Блог</h1>
	    <section class="featured-posts-section">
	        <div class="row">
	        	@foreach($posts as $post)
	            <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
	                <div class="blog-post-thumbnail-wrapper">
	                    <img src="{{url('storage/'.$post->preview_image)}}" alt="blog post">
	                </div>
	                <p class="blog-post-category">{{$post->category->title}}</p>
	                <a href="{{route('post.show', $post->id)}}" class="blog-post-permalink">
	                    <h6 class="blog-post-title">{{$post->title}}</h6>
	                </a>
	            </div>
	            @endforeach
	            <div class="mx-auto" style="margin-top:-40px;">
	            	{{$posts->links()}}
	            </div>
	        </div>
	    </section>
	    <div class="row">
	        <div class="col-md-8">
	            <section>
	                <div class="row blog-post-row">
	                	@foreach($randomPosts as $post)
	                    <div class="col-md-6 blog-post" data-aos="fade-up">
	                        <div class="blog-post-thumbnail-wrapper">
	                            <img src="{{url('storage/' . $post->preview_image)}}" alt="blog post">
	                        </div>
	                        <p class="blog-post-category">{{$post->category->title}}</p>
	                        <a href="{{route('post.show', $post->id)}}" class="blog-post-permalink">
	                            <h6 class="blog-post-title">{{$post->title}}</h6>
	                        </a>
	                    </div>
	                    @endforeach
	                </div>
	            </section>
	        </div>
	        <div class="col-md-4 sidebar" data-aos="fade-left">
	            <div class="widget widget-post-carousel">
	                <h5 class="widget-title">Посты</h5>
	                <div class="post-carousel">
	                    <div id="carouselId" class="carousel slide" data-ride="carousel">
	                        <ol class="carousel-indicators">
	                            <li data-target="#carouselId" data-slide-to="0" class="active"></li>
	                            <li data-target="#carouselId" data-slide-to="1"></li>
	                            <li data-target="#carouselId" data-slide-to="2"></li>
	                        </ol>
	                        <div class="carousel-inner" role="listbox">
	                            <figure class="carousel-item active">
	                                <img src="{{asset('storage/' . $caruselPost[0]->preview_image)}}" alt="First slide">
	                                <figcaption class="post-title">
	                                    <a href="{{route('post.show', $caruselPost[0]->id)}}" class="blog-post-permalink">{{$caruselPost[0]->title}}</a>
	                                </figcaption>
	                            </figure>
	                            <figure class="carousel-item">
	                                    <img src="{{asset('storage/' . $caruselPost[1]->preview_image)}}" alt="First slide">
	                                    <figcaption class="post-title">
	                                        <a href="{{route('post.show', $caruselPost[1]->id)}}" class="blog-post-permalink">{{$caruselPost[1]->title}}</a>
	                                    </figcaption>
	                            </figure>
	                            <div class="carousel-item">
	                                    <img src="{{asset('storage/' . $caruselPost[2]->preview_image)}}" alt="First slide">
	                                    <figcaption class="post-title">
	                                        <a href="{{route('post.show', $caruselPost[2]->id)}}" class="blog-post-permalink">{{$caruselPost[2]->title}}</a>
	                                    </figcaption>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="widget widget-post-list">
	                <h5 class="widget-title">Популярные посты</h5>
	                <ul class="post-list">
	                	@foreach($likedPosts as $post)
		                    <li class="post">
		                        <a href="#!" class="post-permalink media">
		                            <img src="{{url('storage/' . $post->preview_image)}}" alt="blog post">
		                            <div class="media-body">
		                                <h6 class="post-title">{{$post->title}}</h6>
		                            </div>
		                            <div>
		                            	{{$post->liked_users_count}}
		                            	<i class="far fa-thumbs-up"></i>
		                            </div>
		                        </a>
		                    </li>
	                    @endforeach
	                </ul>
	            </div>
	        </div>
	    </div>
	</div>

</main>
@endsection