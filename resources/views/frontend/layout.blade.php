<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ url('css/frontend/theme.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header>
    <div class="container d-flex align-items-center justify-content-between">
        <div class="logo">
            <a href="/">
                @if($logo && $logo->thumbnail)
                    <img src="{{ url('image/', $logo->thumbnail) }}" alt="Logo" style="max-height: 50px;">
                @else
                    <h1>KH FASHION</h1>
                @endif
            </a>
        </div>
        <ul class="menu d-flex">
            <li><a href="/">HOME</a></li>
            <li><a href="/shop">SHOP</a></li>
            <li><a href="/get-news">NEWS</a></li>
        </ul>
        <div class="search">
            <form action="{{ route('search-product') }}" method="get" class="d-flex">
                <input type="text" name="search" class="form-control" placeholder="SEARCH HERE">
                <button class="btn btn-outline-secondary" type="submit">
                    <div style="background-image: url('search.png');
                                width: 28px;
                                height: 28px;
                                background-position: center;
                                background-size: contain;
                                background-repeat: no-repeat;">
                    </div>
                </button>
            </form>
        </div>
        
    </div>
</header>
@yield('content')
<footer>
    <span>
        All Rights Reserved @ 2023
    </span>
</footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</html>
