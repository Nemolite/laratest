@extends('basa')

@section('content')
    <a href="{{ route('home') }}" class="btn btn-primary">Вход в админку</a>
<h1 class="main-tilte">Список задач</h1>
<div class="main-table">

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tasks</th>
            <th scope="col">Image</th>
            <th scope="col">Tags</th>
            <th scope="col">Users</th>
        </tr>
        </thead>
        @foreach ($tasks as $task)
            <tbody>
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $task->taskname }}</td>
                    <td>
                        <a href="{{ Storage :: url ( $task->image  ) }}" target="_blank">
                            <img width="150px" height="150px" src="/public{{ Storage :: url ( $task->image  ) }}" alt="">
                        </a>
                    </td>
                    <td>
                        @foreach ($out_tags[$task->id] as $tags)
                            {{ $tags->tagname }}
                            <br>
                        @endforeach

                    </td>
                    <td>@mdo</td>
                </tr>
            </tbody>
        @endforeach
    </table>

</div>
@endsection
