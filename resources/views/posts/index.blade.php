@extends('layouts.app')

@section('content')

<div class="container">
         <a href="{{ route('posts.create')}}" class="btn btn-info btn-md" role="button" aria-pressed="true">Aggiungi post</a>
     

    <table class="table  mt-2" style="background-color: rgba(255, 255, 255, 0.5);">
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
                <td>
                    <a href="{{ route('posts.show', $post)}}" class="btn btn-success btn-md" role="button" aria-pressed="true"><i class="bi bi-zoom-in"></a></i>
                
                </td>
                <td>
                    
                     <a href="{{ route('posts.edit', $post)}}" class="btn btn-light btn-md" role="button" aria-pressed="true"><i class="bi bi-pencil-fill"></a></i>
                     
                </td>
                <td>
                <!--modal-->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal-{{$post->id}}">
                    delete
                </button>
                <div class="modal fade" id="exampleModal-{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                                <div class="modal-body">
                                <h5>Sei sicuro di voler cancellare questo elemento?</h5> 
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                <form action="{{route ('posts.destroy', $post)}}" method="POST"><!--bisogna indicare il method delete, al form e al submit, perchè altrimenti torna sulla rotta show-->
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>            
            </td>
           
        </tr>
        @endforeach
            
        </tbody>
    </table>


</div>

@endsection