<!DOCTYPE html>
<html lang="en">

<head>
    <title>All Posts</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
@include('layouts.app')

<body>
    <div class="container">
        <h2>All Post List</h2>
        <p> PostList Using Laravel Eloquent ORM</p>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th><span>Title</span></th>
                    <th><span>content</span></th>
                    <th><span>Author</span></th>
                    <th><span>Show details</span></th>



                </tr>
            </thead>

            <tbody>
                @foreach ($post as $data)
                    <tr>
                        <td class="lalign">{{ $data->title }}</td>
                        <td>{{ $data->content }}</td>
                        <td>{{ $data->User->name }}</td>
                        <td><a href="postsingle/{{ $data->id }}">Show</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</body>

</html>
