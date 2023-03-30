<!DOCTYPE html>
<html>
<head>
	<title>New Blog Post</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2>{{ $post->title }}</h2>
				<img src="{{ asset('public/storage/post/'.$post->image) }}" alt="{{ $post->title }}">
                <a class="btn btn-primary" href="">Click Here</a>
			</div>
		</div>
	</div>
</body>
</html>

