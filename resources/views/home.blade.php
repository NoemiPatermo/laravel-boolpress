@extends('layouts.app')

@section('content')
        <div class="container-home">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Dashboard') }}</div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                {{ __('You are logged in!') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    @foreach($allPosts as $post)
                    
                          <div class="box-post col-4">
                            <h1> {{$post->title}}</h1>
                            <img src=" {{$post->cover}}"/>
                         </div> 
        
                    <div class="row justify-content-center mt-3">
                         <div class=" text-post mb-3">
                                <h2>{{$post->author}}</h2>
                                <p>{{$post->content}}</p>
                                <h6>{{$post->date}}</h6>
                             </div>      
                     </div>
                            
                    @endforeach
                </div>
        </div>

   
@endsection
