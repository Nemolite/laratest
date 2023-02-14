@extends('basa')

@section('content')
    <h1 class="main-tilte">Форма добавление задачи для  пользователя:{{ Auth::user()->name }}</h1>

    <div class="main-table">
        <a href="{{ route('home') }}" class="btn btn-primary">Вернутся в админку</a>
        <!-- Форма ввода задач -->
        <div class="tasks-form">
            <form name="taskform" id="taskform" method="POST" enctype="multipart/form-data" action="">
                @csrf
                <div class="form-group">
                    <label for="taskname">Добавьте задачу</label>
                    <textarea name="taskname" id="taskname" rows="3" cols="60"></textarea>
                </div>

                <div class="form-group">
                    <label for="tags">Выберите тег</label>
                    <select class="custom-select" id="tags" name="tags" required>
                        <option selected disabled value="">Выбрать...</option>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->tagname }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label for="image">Добавьте файл изображения к задаче</label>
                    <input type="file" class="form-control-file" name="image" id="image">
                </div>
                <input type="button" name="createbtn" id="createbtn" value="Сохранить задачу" class="btn btn-success">

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
