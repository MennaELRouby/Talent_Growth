<!DOCTYPE html>
<html lang="en">

<head>
    <title>Post Blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
@include('layouts.app')

<body>

    <div class="container">
        <h2>Show Post Details</h2>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" placeholder="Enter title" name="title"
                value="{{ $post->title }}">
        </div>
        <div class="form-group">
            <label for="price">user:</label>
            <input type="text" class="form-control" id="user" placeholder="user" name="user"
                value="{{ $post->user?->name }}">
        </div>
        <div class="form-group">
            <label for="description">Content:</label>
            <textarea class="form-control" rows="5" id="description" name="content">{{ $post->content }}</textarea>
        </div>
    </div>
    <div class="pt-5">
        <h3 class="mb-5">{{ $cmt->count() }} Comments</h3>
        <ul class="comment-list">
            @foreach ($cmt as $data)
                <li class="comment">
                    <div class="comment-body">
                        <h3>{{ $data->User->name }}</h3>
                        <div class="meta">{{ $data->created_at }}</div>

                        <form action="{{ route('updatecomment', [$data->id]) }}" method="post">
                            @csrf
                            @method('put')
                            <textarea class="form-control" rows="5" id="description" name="content">{{ $data->content }}</textarea>
                            <input type="hidden" hidden value="{{ $post->id }}" name="post_id">
                            @if (auth()->User()->name == $data->user->name)
                                <button type="submit" class="btn btn-default">update comment</button>
                            @endif
                        </form>
                        @if (auth()->User()->name == $data->user->name)
                            <form action="{{ route('deletecomment', [$data->id]) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-default">Delete comment</button>
                                <input type="hidden" hidden value="{{ $post->id }}" name="post_id">
                                @method('delete')
                        @endif
                        </form>

                    </div>
                </li>
            @endforeach
            <!-- END comment-list -->
            <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form action="{{ route('comment') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="content" id="message" cols="10" rows="10" class="form-control"></textarea>
                    </div>
                    <input type="hidden" hidden value="{{ $post->id }}" name="post_id">
                    <input type="hidden" hidden value="{{ auth()->User()->id }}" name="user_id">



                    <div class="form-group">
                        <input type="submit" value="Post Comment" class="btn btn-primary btn-md text-white">
                    </div>

                </form>
            </div>

    </div>

</body>

</html>
