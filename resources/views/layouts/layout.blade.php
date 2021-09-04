<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ mix( 'css/app.css' ) }}">
</head>
<body>

<div id="app">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link {{ $activeMain }}" href="{{ route( 'home' ) }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $activeArticles }}" href="{{ route( 'article.index' ) }}">Articles</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        @yield( 'hero' )
        @yield( 'content' )

    </div>
</div>

<script src="{{ mix( 'js/app.js' ) }}"></script>
</body>
</html>
