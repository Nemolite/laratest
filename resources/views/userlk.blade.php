@extends('basa')

@section('content')
<h1 class="main-tilte">Личный кабинет пользователя:</h1>
<div class="main-table">

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tasks</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        @foreach ($tasks as $task)
            <tbody>
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $task->taskname }}</td>
                <td>

                </td>
                <td>

                </td>
            </tr>
            </tbody>
        @endforeach
    </table>

</div>

@endsection
