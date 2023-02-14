@extends('basa')

@section('content')
    <h1 class="main-tilte">Изменение задачи пользователя:{{ Auth::user()->name }}</h1>
    <a href="{{ route('home') }}" class="btn btn-primary">Вернутся в админку</a>
    <div class="main-table">
        <div class="tasks-form">
            <form name="updatetaskform" id="updatetaskform" method="POST" enctype="multipart/form-data" action="{{ route('tasks.update',$task->id) }}">
                @csrf
                @method('patch')

                <div class="form-group">
                    <label for="updatetaskname">Измените задачу</label>
                    <textarea name="updatetaskname" id="updatetaskname" rows="3" cols="60" >{{ $task->taskname }}</textarea>
                </div>

                <div class="form-group">

                    <p>Теги задачи</p>
                    <!-- Вывести теги к задаче-->

                    <label for="tags">Измените теги</label>

                    <select class="custom-select" id="tags" name="updatetags" required>
                        <option selected disabled >Выбрать...</option>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->tagname }}</option>
                        @endforeach

                    </select>
                </div>
            <!-- Вывести файл изображения к задаче-->
                <div class="form-group">
                    <label for="image">Изменить файл изображения к задаче</label>
                    <input type="file" class="form-control-file" name="updateimage" id="image">
                </div>
                <input type="hidden" name="updatetaskid" id="updatetaskid" value="{{ $task->id }}">
                <input type="submit" name="updatebtn" id="updatebtn" value="Сохранить изменения задачи" class="btn btn-success">

            </form>

            <div id="result">

            </div>


            <!-- Вывод ошибок валидации формы -->

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
@endsection
