<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add post</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
@include('layouts.app')

<body>

    <div class="container">
        <h2>Add Post</h2>
        <form action="{{ route('post') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">title</label>
                <input type="text" class="form-control" id="title" placeholder="title" name="title"
                    value="{{ old('title') }}">
                @error('title')
                    <div class="alert alert-warning">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Content:</label>
                <textarea class="form-control" rows="5" id="description" name="content">{{ old('content') }}</textarea>
                @error('content')
                    <div class="alert alert-warning">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="user" placeholder="user" name="user_id"
                    value="{{ auth()->User()->id }}">
            </div>

            <button type="submit" class="btn btn-default">Add Post</button>
        </form>
    </div>

</body>

</html>
