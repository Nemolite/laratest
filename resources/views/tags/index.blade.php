@extends('basa')

@section('content')
    <h1 class="main-tilte">Tags</h1>
    <a href="{{ route('home') }}" class="btn btn-primary">Вернутся в админку</a>
    <a href="{{ route('tags.create') }}" class="btn btn-primary">Добавить тег</a>
    <div class="main-table">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tags</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($tags as $tag)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $tag->tagname }}</td>
                    <td>
                        <a href="">Изменить</a>
                    </td>
                    <td>
                        <a href="">Удалить</a>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
@endsection
