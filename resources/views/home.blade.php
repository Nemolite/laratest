@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Панель управления') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        Личный кабинет пользователя:<h3>{{ Auth::user()->name }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('taskscontent')
    <div class="main-table">
        <a href="{{ route('tasks.create') }}" class="btn btn-success">Добавить задачу</a>

        <a href="{{ route('tags.index') }}" class="btn btn-success">Работа с тегами</a>

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

                                <a href="{{ route('tasks.deleteone',$task->id) }}" class="btn btn-danger">Удалить задачу </a>
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







