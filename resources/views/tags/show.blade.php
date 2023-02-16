@extends('basa')

@section('content')
    <a href="{{ route('home') }}" class="btn btn-primary">Вернутся в админку</a>
    <div class="main-table">
       <h2>Тег</h2>
       <p>{{ $tag->tagname }}</p>
    </div>
    <a href="{{ route('tags.edit',$tag->id) }}" class="btn btn-warning">Изменить тег</a>

    <form name="deletetagform" id="deletetagform" method="POST" enctype="multipart/form-data" action="{{ route('tags.destroy',$tag->id)}}">
        @csrf
        @method('delete')
        <input type="submit" name="deletetagbtn" id="deletetagbtn" value="Удалить тег" class="btn btn-danger">
    <form>
@endsection
