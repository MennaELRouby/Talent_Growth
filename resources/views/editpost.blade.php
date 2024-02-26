<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Post</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
@include('layouts.app')

<body>

    <div class="container">
        <h2>Edit Post</h2>
        <form action="{{ route('updatepost', [$post->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" placeholder="Enter title" name="title"
                    value="{{ $post->title }}">
            </div>

            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" rows="5" id="description" name="content">{{ $post->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-default">update Post</button>
        </form>
    </div>

</body>

</html>
