<!DOCTYPE html>
<html>

<head>
    <title>Daftar Artikel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            </div>
            <div class="col-md-6">
                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
            </div>
        </div>
    </div>
    <div class="container">
        <h1>Daftar Artikel</h1>
        <div class="row">
            {{-- @foreach ($articles as $article) --}}
            <div class="col-md-4">
                <div class="card">
                    <img src="" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"></p>
                        <a href="#" class="btn btn-primary">Baca
                            Selengkapnya</a>
                    </div>
                </div>
            </div>
            {{-- @endforeach --}}
        </div>
    </div>
</body>

</html>
