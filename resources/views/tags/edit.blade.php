@extends('basa')

@section('content')
    <a href="{{ route('home') }}" class="btn btn-primary">Вернутся в админку</a>
    <div class="main-table">

        <div class="tasks-form">
            <form name="updatetagform" id="updatetagform" method="POST" enctype="multipart/form-data" action="{{ route('tags.update',$tag->id) }}">
                @csrf
                @method('patch')

                <div class="form-group">
                    <label for="updatetagname">Измените тегу</label>
                    <input type="text" class="form-control-file" name="updatetagname" id="updatetagname" value="{{ $tag->tagname }}">
                </div>
                <input type="submit" name="updatetagbtn" id="updatetagbtn" value="Сохранить изменения тега" class="btn btn-success">

            </form>
        </div>
    </div>

@endsection
