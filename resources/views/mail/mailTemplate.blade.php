<!DOCTYPE html>

<head>
    <title> New Mail </title>
</head>

<body>
    <h1> Show Email </h1>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <h2>Full Name: {{ $name }}</h2>
                <br>
                <h2>Email: {{ $email }}</h2>
                <br>
                <h2>Message Content:</h2>
                <p>{{ $content }}</p>
            </div>
        </div>
    </div>
</body>

</html>
