@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create a post</h1> 
            @foreach ($posts as $post)
                <div class="mb-3">
                    <div>
                        Title: {{ $post->title }}<br>
                        Tags: @foreach ($post->tags as $tag) {{ $tag->name }} @endforeach
                    </div>
                </div>
            @endforeach
            <div class="mt-5"> 
                <form action="{{ route('posts.store') }}" method="POST">
                    {{ csrf_field() }}
                    Title : <input type="text" name="title">
                    
                    <br>
                    <br>
                    
                    Tags: <input type="text" name="tags">
                    
                    <br>
                    <br>
                    
                    <button>submit</button> 
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
