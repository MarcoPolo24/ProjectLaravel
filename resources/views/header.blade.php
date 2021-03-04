<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/app.css" rel="stylesheet">
    <script src="/js/app.js"></script>
    <title>@yield('title')</title>
</head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
        <a class="navbar-brand" href="/">Music Finder</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/concerts">Conciertos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="/">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            </form>

            <form class="form-inline my-2 my-lg-0" action="/login">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log In</button>
            </form>
            
            <form class="form-inline my-2 my-lg-0" action="/register">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign Up</button>
            </form>

            
        </div>
    </nav>
        <div class="container-fluid">
            @yield('content')
        </div>
    </body>
</html>