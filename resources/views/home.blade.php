@extends('layouts.app')

@section('content')
<div class="container">
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

              <!--   <div class="row mt-3">
                    @foreach($allPosts as $post)
                        <div class="box-post col-4">
                            <h5> {{$post->title}}</h5>
                            <img src=" {{$post->cover}}"/>
                            
                            <div class="text-post">
                                <p>{{$post->author}}
                                <p>{{$post->text}}
                            </div>


                        </div>
                        
                    @endforeach
                </div>-->
</div>

   
@endsection
