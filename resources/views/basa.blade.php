<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <title>TODO List</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
    <a class="navbar-brand" href="#">TODO List</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Главная <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a href="{{ route('home') }}" class="btn btn-primary">Вход в админку</a>
            </li>
        </ul>
        <form name="searchform" id="searchform" method="POST" enctype="multipart/form-data" action="{{ route('search') }}" class="form-inline my-2 my-lg-0">
            @csrf
            <label class="sr-only" for="search">Поиск задачи</label>
            <input type="text" class="form-control mr-sm-2" id="search" name="search" placeholder="Например:Задачу">
            <button type="submit" class="btn btn-primary my-2 my-sm-0 btn-secondary">Искать</button>
        </form>
    </div>
</nav>

<main role="main" class="container container-fixing">
    <div class="starter-template">
        <h1>Тестовое задание</h1>
        <h2>Реализовать ToDo список</h2>
        <p class="lead">
            Для реализации использован на бекенде PHP, фреймворк - Laravel, <br>
            на фронте JS / jQuery.<br>
            Для элементов интерфейса – Bootstrap
        </p>
        @yield('content')
    </div>

</main><!-- /.container -->


<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="{{ asset('public/js/script.js') }}"></script>
</body>
</html>
