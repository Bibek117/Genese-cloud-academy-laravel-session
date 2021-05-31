@extends('layout')

@section('content')
<div class="container">
    @foreach ($posts as $post)
        <div class="post">
            <h2>{{$post['title']}}</h2>
            <p>Author: {{$post['author']}}</p>
            <p>Email: {{$post['contact-num']}}</p>
            <p>Contact-num:{{$post['email']}}</p>
            <div class="post-content">
                {{$post['Content']}}
            </div>
        </div>
    @endforeach
</div>

@endsection
