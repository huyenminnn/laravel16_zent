@extends('layouts/master');
@section('content')
<div class="content col-xs-8">
        
        @foreach($posts as $post)
        <article>
                <div class="post-image">
                    <img src="/storage/{{ $post->thumbnail }}" alt="post image 1">
                    <div class="category"><a href="{{ asset('blog_assets/#')}}">{{ $post->cate->name }}</a></div>
                </div>
                <div class="post-text">
                    <span class="date">{{ date('F d, Y', strtotime($post->created_at)) }}</span>
                    <h2><a href="{{ route('content', ['id' => $post->id]) }}">{{ $post->title }}</a></h2>
                    <p class="text">{!! $post->description !!}
                                    <a href="{{ route('content',['id' => $post->id]) }}"><i class="icon-arrow-right2"></i></a></p>                                 
                </div>
                <div class="post-info">
                    <div class="post-by">Post By <a href="#">{{ $post->user->name }}</a></div>
                    <div class="extra-info">
                        <a href="{{ asset('blog_assets/#')}}"><i class="icon-facebook5"></i></a>
                        <a href="{{ asset('blog_assets/#')}}"><i class="icon-twitter4"></i></a>
                        <a href="{{ asset('blog_assets/#')}}"><i class="icon-google-plus"></i></a>
                        <span class="comments">25 <i class="icon-bubble2"></i></span>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </article>
        @endforeach
            
        
            <!-- NAVIGATION -->
            <div class="navigation">
                <a href="{{ asset('blog_assets/#')}}" class="prev"><i class="icon-arrow-left8"></i> Previous Posts</a>
                <a href="{{ asset('blog_assets/#')}}" class="next">Next Posts <i class="icon-arrow-right8"></i></a>
                <div class="clearfix"></div>
            </div>
        
        </div>
@endsection