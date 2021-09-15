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
        </tr>
    </thead>

    <tbody>
    @foreach($posts as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->author}}</td>
            <td>{{$post->date}}</td>
            <td><img src="{{$post->cover}}"/></td>
            <td>{{$post->content}}</td>
        </tr>
    @endforeach
        
    </tbody>
    </table>


</div>

@endsection