@extends('layouts.app') <!--estendi il layouts blade-->

@section('content')

<div class="container">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Author</th>
        <th scope="col">Date</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>

    <tbody>
    @foreach($posts as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->author}}</td>
            <td>{{$post->date}}</td>
            <td><a href="{{ route('posts.show', $post)}}"><i class="bi bi-zoom-in"></i></a></td>
        </tr>
    @endforeach
        
    </tbody>
    </table>


</div>

@endsection