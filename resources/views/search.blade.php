@extends('basa')

@section('content')
    @foreach ( $search as $task)
        <p>{{ $task->taskname }}</p>
    @endforeach
@endsection
