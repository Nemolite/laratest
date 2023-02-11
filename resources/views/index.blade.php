@extends('basa')

@section('content')
<h1 class="main-tilte">Список задач</h1>
<div class="main-table">

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tasks</th>
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
