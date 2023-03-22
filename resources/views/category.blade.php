@extends('layouts.app')
@section('content')
    <div class="py-5 bg-light" style="margin-top:5rem">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span>Category</span>
                    <h3>{{ $categroy->name }}</h3>
                    <p>{{ $categroy->description }}</p>
                </div>
            </div>
        </div>
    </div>

    <section class="blog-post mt-5">
        <div class="container">
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-lg-4">
                        <p class="blog-post-meta">{{ $post->created_at->format('M d, Y') }} by
                            <a href="#">{{ $post->user->name }}</a>
                        </p>
                        <a href="{{ route('view.post', $post->slug) }}"><img class="img-fluid mb-3"
                                src="{{ asset('public/storage/post/' . $post->image) }}" alt=""></a>
                        <span class="post-category text-white bg-danger mb-3">{{ $post->category->name }}</span>
                        <h2 class="blog-post-title">{{ $post->title }}</h2>
                        <p>{!! Str::limit($post->description, 300) !!}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row text-center pt-5 border-top">
            <div class="col-md-12">
                {{ $posts->links() }}
            </div>
        </div>
    </section>
@endsection
