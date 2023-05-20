<!DOCTYPE html>
<html>

<head>
    <title>Article Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Article Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <p class="card-text">{{ $article->content }}</p>
                <p class="card-text">Category: {{ $article->category->name }}</p>
            </div>
        </div>
    </div>
</body>

</html>
