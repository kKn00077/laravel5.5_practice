@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Comment</h1>

            @foreach ($comments as $comment)
            <p>Comment: {{ $comment->body }} </p>
            <p>Blog Title: {{ $comment->blog->title }} </p>
            @endforeach
        </div>
    </div>
</div>
@endsection
