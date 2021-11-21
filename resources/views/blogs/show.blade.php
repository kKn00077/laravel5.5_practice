@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Blog Show Page</h1>

            <p>Blog Title: {{ $blog->title }}</p>
            <p>Blog Description: {{ $blog->description }}</p>

            <div>
                @foreach ($blog->comments as $comment)
                    <p>{{ $comment->body }}</p>
                @endforeach
            </div>

            <form action="{{ route('comments.store') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                <input type="text" name="body" placeholder="write..."><br>
                <button>save</button> 
            </form>
        </div>
    </div>
</div>
@endsection
