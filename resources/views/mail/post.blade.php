<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>New Blog Post</title>
    </head>
    <body>
        <h1>New Blog Post</h1>
        <p>A new blog post has been created:</p>
        <h2>{{ $post->title }}</h2>
        <img src="{{ asset('public/storage/post/'.$post->image) }}" alt="Blog post image">
    </body>
</html>
