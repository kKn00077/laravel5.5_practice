@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create Page</h1>
            <form action="{{ route('blogs.store') }}" method="POST">
                {{ csrf_field() }}
                <input type="text" name="title" placeholder="title"><br>
                <input type="text" name="description" placeholder="description"><br>
                <button>save</button> 
            </form>
        </div>
    </div>
</div>
@endsection
