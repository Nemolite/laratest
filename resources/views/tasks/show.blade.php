@extends('basa')

@section('content')
    <h1 class="main-tilte">Задача пользователя:{{ Auth::user()->name }}</h1>
    <a href="{{ route('home') }}" class="btn btn-primary">Вернутся в админку</a>
    <div class="main-table">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tasks</th>
                <th scope="col">Image</th>
                <th scope="col">Tags</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>

                <tbody>


                    <tr>
                        <th scope="row">1</th>
                        <td>{{ $task->taskname }}</td>
                        <td>
                            <img src="{{ $task->image }}" alt="">

                        </td>
                        <td>
                            @foreach ($out_tags[$task->id] as $tags)
                                {{ $tags->tagname }}
                                <br>
                            @endforeach
                        </td>
                        </td>
                        <td>
                            <a href="">Изменить</a>
                        </td>
                        <td>
                            <a href="">Удалить</a>
                        </td>
                    </tr>


                </tbody>

        </table>
    </div>
@endsection

