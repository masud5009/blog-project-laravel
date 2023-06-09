@extends('layouts.app')
@section('content')
<div class="main-content">
        {{-- HOT POST --}}
        <div class="site-section bg-light">
            <div class="container">
                <div class="row align-items-stretch retro-layout-2">
                    {{-- FIRST 2 POST HEARE --}}
                    <div class="col-md-4">
                        @foreach ($first_header as $post)
                            <a href="{{ route('view.post', $post->slug) }}" class="h-entry mb-30 v-height gradient"
                                style="background-image: url('{{ asset('public/storage/post/' . $post->image) }}');">

                                <div class="text">
                                    <h2>{{ $post->title }}</h2>
                                    <span class="date">{{ $post->created_at->diffForHumans() }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    {{-- SECOND 1 POST HEARE --}}
                    <div class="col-md-4">
                        @foreach ($second_header as $post)
                            <a href="{{ route('view.post', $post->slug) }}" class="h-entry img-5 h-100 gradient"
                                style="background-image: url('{{ asset('public/storage/post/' . $post->image) }}');">

                                <div class="text">
                                    <div class="post-categories mb-3">
                                        <span class="post-category bg-danger">{{ $post->category->name }}</span>
                                    </div>
                                    <h2>{{ $post->title }}</h2>
                                    <span class="date">{{ $post->created_at->diffForHumans() }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    {{-- LAST 2 POST HEARE --}}
                    <div class="col-md-4">
                        @foreach ($last_header as $post)
                            <a href="{{ route('view.post', $post->slug) }}" class="h-entry mb-30 v-height gradient"
                                style="background-image: url('{{ asset('public/storage/post/' . $post->image) }}');">

                                <div class="text">
                                    <h2>{{ $post->title }}</h2>
                                    <span class="date">{{ $post->created_at->diffForHumans() }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        {{-- /.HOT POST --}}
        {{-- ALL BLOG POST --}}
        <section class="blog-post mt-5">
            <div class="container">
                <div class="row">
                    @foreach ($recentPosts as $post)
                        <div class="col-lg-4 mb-5">

                            <a href="{{ route('view.post', $post->slug) }}"><img class="img-fluid mb-3"
                                    src="{{ asset('public/storage/post/' . $post->image) }}" alt="{{ $post->title }}"></a>
                            <span class="post-category text-white bg-danger mb-3">{{ $post->category->name }}</span>
                            <p style="font-weight:bold" class="blog-post-meta">{{ $post->created_at->diffForHumans() }} by
                                <a href="#">{{ $post->user->name }}</a></p>
                            <a href="{{ route('view.post',$post->slug)}}">
                                <h3 class="blog-post-title">{{ $post->title }}</h3></a>
                            {{-- <p>{!! Str::limit($post->description, 300) !!}</p> --}}
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row text-center pt-5 border-top">
                <div class="col-md-12">
                    {{ $recentPosts->links() }}
                </div>
            </div>
        </section>
        {{-- /.ALL BLOG POST --}}
        {{-- RANDOM POST --}}
        <div class="site-section bg-light">
            <div class="container">

                <div class="row align-items-stretch retro-layout">
                    @foreach ($first_footer as $post)
                        <div class="col-md-5 order-md-2">
                            <a href="{{ route('view.post', $post->slug) }}" class="hentry img-1 h-100 gradient"
                                style="background-image: url('{{ asset('public/storage/post/' . $post->image) }}');">
                                <span class="post-category text-white bg-danger">{{ $post->category->name }}</span>
                                <div class="text">
                                    <h2>{{ $post->title }}</h2>
                                    <span>{{ $post->created_at->diffForHumans() }}</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    <div class="col-md-7">
                        @foreach ($last_footer as $post)
                            <a href="{{ route('view.post', $post->slug) }}" class="hentry img-2 v-height mb30 gradient"
                                style="background-image: url('{{ asset('public/storage/post/' . $post->image) }}');">
                                <span class="post-category text-white bg-success">{{ $post->category->name }}</span>
                                <div class="text text-sm">
                                    <h2>{{ $post->title }}</h2>
                                    <span>{{ $post->created_at->diffForHumans() }}</span>
                                </div>
                            </a>
                        @endforeach

                        <div class="two-col d-block d-md-flex justify-content-between">
                            @foreach ($second_footer as $post)
                                <a href="{{ route('view.post', $post->slug) }}" class="hentry v-height img-2 gradient"
                                    style="background-image: url('{{ asset('public/storage/post/' . $post->image) }}');">
                                    <span class="post-category text-white bg-primary">{{ $post->category->name }}</span>
                                    <div class="text text-sm">
                                        <h2>{{ $post->title }}</h2>
                                        <span>{{ $post->created_at->diffForHumans() }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                    </div>
                </div>

            </div>
        </div>
        {{-- /.ALL BLOG POST --}}
        {{-- SUBSCRIBER SECTION --}}
        <div class="site-section bg-lightx">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-md-5">
                        <div class="subscribe-1 ">
                            <h2>Subscribe to our newsletter</h2>
                            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt
                                error illum a explicabo, ipsam nostrum.</p>
                            <form action="#" class="d-flex">
                                <input type="text" class="form-control" placeholder="Enter your email address">
                                <input type="submit" class="btn btn-primary" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- /.SUBSCRIBER SECTION --}}
</div>
@endsection
