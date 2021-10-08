@extends('layouts.app')

@section('content')
     
        <div class="show container">
            <a href="{{ route('posts.index')}}" class="btn btn-info btn-md" role="button" aria-pressed="true"><i class="bi bi-brush-fill">Torna alla lista</i></a>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                           
                                <div class="card-body">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                        </div>
                                    @endif    
                                </div>
                            
                        </div>
                    </div>
                    <div class="row  justify-content-center mt-5">
                        <div class="box-post col-6">
                            <h1>{{$post->title}}</h1>
                            <img src="{{$post->cover}}"/>    
                        </div>

                        <div class="box-text col-6 ">
                                <h3>{{$post->author}}</h3>
                                <p>{{$post->content}}</p>
                                <h6>{{$post->date}}</h6>
                                <span style="font-weight: bolder;">Categoria: {{$post->category->name}}</span> <!--PER MOSTRARE LA CATEGORIA SUL NUOVO POST-->
                        </div>
                    </div>
        </div>

@endsection