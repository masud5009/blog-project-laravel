<?php
use App\Models\Post;
?>

@extends('layouts.app')
@section('content')
    <div class="site-cover site-cover-sm same-height overlay single-page"
        style="background-image: url('{{ asset('public/storage/post/' . $post->image) }}');">
        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="post-entry text-center">
                        <span class="post-category text-white bg-success mb-3">{{ $post->category->name }}</span>
                        <h1 class="mb-4"><a href="javascript:void()">{{ $post->title }}</a></h1>
                        <div class="post-meta align-items-center text-center">
                            <figure class="author-figure mb-0 mr-3 d-inline-block"><img
                                    src="{{ asset('public/storage/user/' . $post->user->image) }}" alt="Image"
                                    class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">{{ $post->user->name }}</span> --
                            <span>{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="site-section py-lg">
        <div class="container">

            <div class="row blog-entries element-animate">

                <div class="col-md-12 col-lg-8 main-content">

                    <div class="post-content-body">
                        {!! $post->description !!}
                    </div>

                    <div class="pt-5">
                        <p>Categories : <a href="{{ route('view.category', $post->category->slug) }}">{{ $post->category->name }}</a>,
                            Tags : @foreach ($post->tag as $tag)
                                <a href="#">{{ $tag->name }}</a>,
                                @endforeach
                        </p>

                    </div>


                    <div class="pt-5">
                        <h3 class="mb-5">Comments</h3>
                        @forelse ($post->comments as $comment)
                            <ul class="comment-list">
                                <li class="comment">
                                    <div class="vcard">
                                        <img src="{{ asset('public/storage/user/' . $comment->user->image) }}"
                                            alt="{{ $comment->user->name }}">
                                    </div>
                                    <div class="comment-body">
                                        @if ($comment->user)
                                            <h3>{{ $comment->user->name }}</h3>
                                        @endif
                                        <div class="meta">{{ $comment->created_at->diffForHumans() }}</div>
                                        <p>{!! $comment->comment_body !!}</p>
                                        <p><a href="javascript::void(0)" class="reply rounded" onclick="reply(this)"
                                                data-commentid="{{ $comment->id }}">Reply</a></p>

                                        <!--reply body area-->
                                        @foreach ($comment->reply as $rep)
                                            <div style="margin-left:5%">
                                                <div class="vcard">
                                                    <img src="{{ asset('public/storage/user/' . $rep->user->image) }}"
                                                        alt="Image placeholder">
                                                </div>
                                                @if ($rep->user)
                                                    <h3>{{ $rep->user->name }}</h3>
                                                @endif
                                                <div class="meta">{{ $rep->created_at->diffForHumans() }}</div>
                                                <p>{{ $rep->reply }}</p>
                                                <p><a href="javascript::void(0)" class="reply rounded" onclick="reply(this)"
                                                    data-commentid="{{ $comment->id }}">Reply</a></p>
                                            </div>
                                        @endforeach
                                        <!--/.reply body area-->

                                    </div>
                                </li>
                            </ul>

                        @empty

                        @endforelse
                        <!--reply-area-->
                        <div class="reply-area" id="reply-area"  style="display:none">
                            <form action="{{ route('reply.store') }}" method="post">
                                @csrf
                                <input type="text" id="commentId" name="commentId" hidden>
                                <textarea name="reply_body" id="reply" cols="50" rows="3"></textarea>
                                <br>
                                <input type="submit" class="btn btn-primary rounded" value="Reply">
                                <a href="#reply-area" class="btn btn-danger rounded" onclick="reply_close(this)">close</a>
                            </form>
                        </div>
                        <!--/.reply-area-->
                        <!-- END comment-list -->

                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">Leave a comment</h3>
                            <form action="{{ route('comment.store') }}" method="post" class="p-5 bg-light">
                                @csrf
                                <input type="hidden" name="post_slug" value="{{ $post->slug }}">
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="comment_body" id="message" cols="20" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Post Comment" class="btn btn-primary">
                                </div>

                            </form>
                        </div>
                    </div>

                </div>

                <!-- END main-content -->

                <div class="col-md-12 col-lg-4 sidebar">
                    <div class="sidebar-box search-form-wrap">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="icon fa fa-search"></span>
                                <input type="text" class="form-control" id="s"
                                    placeholder="Type a keyword and hit enter">
                            </div>
                        </form>
                    </div>
                    <!-- END sidebar-box -->
                    <div class="sidebar-box">
                        <div class="bio text-center">
                            <img src="{{ asset('public/storage/user/' . $post->user->image) }}" alt="Image Placeholder"
                                class="img-fluid mb-5">
                            <div class="bio-body">
                                <h2>{{ $post->user->name }}</h2>
                                <p class="mb-4">{{ $post->user->description }}</p>
                                <p class="social">
                                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                                    <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                                    <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END sidebar-box -->
                    <div class="sidebar-box">
                        <h3 class="heading">Popular Posts</h3>
                        <div class="post-entry-sidebar">
                            <ul>
                                @foreach ($popular_post as $post)
                                    <li>
                                        <a href="">
                                            <img src="{{ asset('public/storage/post/' . $post->image) }}"
                                                alt="Image placeholder" class="mr-4">
                                            <div class="text">
                                                <h4>{{ $post->title }}</h4>
                                                <div class="post-meta">
                                                    <span class="mr-2">{{ $post->created_at->diffForHumans() }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- END sidebar-box -->

                    <div class="sidebar-box">
                        <h3 class="heading">Categories</h3>
                        <ul class="categories">

                            @foreach ($category as $cat)
                                @php
                                    $post_count = \App\Models\Post::postCount($cat->id);
                                @endphp
                                <li><a href="#">{{ $cat->name }} <span>({{ $post_count }})</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- END sidebar-box -->

                    <div class="sidebar-box">
                        <h3 class="heading">Tags</h3>
                        <ul class="tags">
                            @foreach ($tags as $tag)
                                <li><a href="#">{{ $tag->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- END sidebar -->

            </div>
        </div>
    </section>

    <div class="site-section bg-light">
        <div class="container">

            <div class="row mb-5">
                <div class="col-12">
                    <h2>More Related Posts</h2>
                </div>
            </div>

            <div class="row align-items-stretch retro-layout">

                <div class="col-md-5 order-md-2">
                    @foreach ($firstPost as $post)
                        <a href="{{ route('view.post', $post->slug) }}" class="hentry img-1 h-100 gradient"
                            style="background-image: url('{{ asset('public/storage/post/' . $post->image) }}');">
                            <span class="post-category text-white bg-danger">{{ $post->category->name }}</span>
                            <div class="text">
                                <h2>{{ $post->title }}</h2>
                                <span>{{ $post->created_at->diffForHumans() }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="col-md-7">
                    @foreach ($secondPost as $post)
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
                        @foreach ($lastPost as $post)
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


    <div class="site-section bg-lightx">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-5">
                    <div class="subscribe-1 ">
                        <h2>Subscribe to our newsletter</h2>
                        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error
                            illum a explicabo, ipsam nostrum.</p>
                        <form action="#" class="d-flex">
                            <input type="text" class="form-control" placeholder="Enter your email address">
                            <input type="submit" class="btn btn-primary" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        function reply(caller) {
            document.querySelector('#commentId').value = $(caller).attr('data-commentid');
            $('.reply-area').insertAfter($(caller));
            $('.reply-area').show();
        }

        function reply_close(caller) {
            $('.reply-area').hide();
        }
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
@endsection
