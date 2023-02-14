@extends('basa')
@section('content')
    <form name="taskform" id="taskform" method="POST" enctype="multipart/form-data" action="{{ route('tags.store') }}">
    @csrf
        <div class="form-group">
            <label for="tagname">Добавьте тег</label>
            <input type="text" class="form-control-file" name="tagname" id="tagname">
        </div>
        <input type="submit" name="createbtn" id="createbtn" value="Сохранить тег" class="btn btn-success">

    </form>
@endsection
