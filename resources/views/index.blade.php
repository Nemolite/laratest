@extends('basa')

@section('content')
    <a href="{{ route('home') }}" class="btn btn-primary">Вход в админку</a>
    <form name="searchform" id="searchform" method="POST" enctype="multipart/form-data" action="{{ route('search') }}">
        @csrf
        <div class="form-row align-items-center">
            <div class="col-sm-3 my-1">
                <label class="sr-only" for="search">Поиск задачи</label>
                <input type="text" class="form-control" id="search" name="search" placeholder="Например:Задачу">
            </div>

            <div class="col-auto my-1">
                <button type="submit" class="btn btn-primary">Искать</button>
            </div>
        </div>
    </form>

    <h3>Теги для выборки</h3>
    <a href="{{ route('index')}}" class="btn btn-info">Все теги</a>
    @foreach ($tags as $tag)
        <a href="{{ route('seltags',$tag->id)}}" class="btn btn-info"> {{ $tag->tagname }}</a>
    @endforeach


<h1 class="main-tilte">Список задач</h1>
<div class="main-table">

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tasks</th>
            <th scope="col">Image</th>
            <th scope="col">Tags</th>
        </tr>
        </thead>

        <tbody>
            @foreach ($tasks as $task)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $task->taskname }}</td>
                        <td>
                            <a href="{{ Storage::url ( $task->image  ) }}" target="_blank">
                                <img width="150px" height="150px" src="/public{{ Storage::url ( $task->image  ) }}" alt="">
                            </a>
                        </td>
                        <td>

                        </td>

                    </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
