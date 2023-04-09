{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Blog Post</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 25rem;
            border: 1px solid gainsboro;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 1rem;
            background-color: antiquewhite;
        }

        .container h1 {
            margin-bottom: 1rem;
        }

        .container p {
            margin-top: 1rem;
        }

        .container a {
            padding: .5rem;
            margin-top: 1rem;
            width: 5rem;
            text-align: center;
            border-radius: .5rem;
            font-size: 1.1rem;
            color: #fff;
            background-color: rgb(0, 0, 0);
        }

        .container img {
            width: 100%;
            overflow: hidden;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <img src="{{ asset('public/storage/post/' . $post->image) }}" alt="{{ $post->title }}">
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempore quibusdam nulla omnis
        </p>
        <a href="">show</a>
    </div>
</body>

</html> --}}

<x-mail::message>
# Order Shipped

Your order has been shipped!
<x-mail::panel>
This is the panel content.
</x-mail::panel>
<x-mail::button :url="$url" color="success">
View
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
