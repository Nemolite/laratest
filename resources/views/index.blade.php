@extends('basa')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <h4>Теги</h4>
                <a href="{{ route('index')}}" class="btn btn-info btn-tags-fix">Все теги</a>
                @foreach ($tags as $tag)
                    <a href="{{ route('seltags',$tag->id)}}" class="btn btn-info btn-tags-fix"> {{ $tag->tagname }}</a>
                @endforeach
            </div>
            <div class="col-sm-10">
                <h4 class="main-tilte">Список задач</h4>
                <div class="main-table">

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">"№ задачи</th>
                            <th scope="col">Описание задачи</th>
                            <th scope="col">Image</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    {{ $task->taskname }}
                                </td>
                                <td>
                                    <a href="{{ Storage::url ( $task->image  ) }}" target="_blank">
                                        <img width="150px" height="150px" src="/public{{ Storage::url ( $task->image  ) }}" alt="">
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- class="main-table" -->
            </div><!-- class="col-sm-10" -->
        </div><!-- class="row" -->
    </div><!-- class="container" -->
@endsection
