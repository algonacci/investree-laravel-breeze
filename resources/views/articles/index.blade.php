<!DOCTYPE html>
<html>

<head>
    <title>Daftar Artikel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Daftar Artikel</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            @foreach ($articles as $article)
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://source.unsplash.com/random/400x200" class="card-img-top"
                            alt="{{ $article->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->body }}</p>
                            <p class="card-text">
                                <span class="tag">{{ $article->category->name }}</span>
                            </p> {{-- Display category name --}}
                            <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary">Baca
                                Selengkapnya</a>
                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
