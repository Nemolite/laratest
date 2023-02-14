@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('taskscontent')
    <h1 class="main-tilte">Личный кабинет пользователя:{{ Auth::user()->name }}</h1>
    <div class="main-table">
        <a href="{{ route('tasks.create') }}" class="btn btn-success">Добавить задачу</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tasks</th>
                <th scope="col">Image</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            @if (count($tasks) > 0)
                <tbody>
                    @foreach ($tasks as $task)

                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><a href="{{ route('tasks.show',$task->id)}}">{{ $task->taskname }}</a></td>
                            <td>
                                <a href="{{ Storage :: url ( $task->image  ) }}" target="_blank">
                                    <img width="150px" height="150px" src="/public{{ Storage :: url ( $task->image  ) }}" alt="">
                                </a>

                            </td>
                            <td>
                                <a href="{{ route('tasks.edit',$task->id)}}" class="btn btn-warning">Изменить</a>
                            </td>
                            <td>
                                <form name="deletetaskform" id="deletetaskform" method="POST" enctype="multipart/form-data" action="{{ route('tasks.destroy',$task->id)}}">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" name="deletebtn" id="deletebtn" value="Удалить" class="btn btn-danger">
                                <form>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            @else
                <p>На данный момент задачи отсутствуют</p>
            @endif
        </table>
        <a href="{{ route('tasks.create') }}" class="btn btn-success">Добавить задачу</a>
    </div>


@endsection







