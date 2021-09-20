@extends('layouts.app')

@section('content')
 <div class="container-edit" style=" background-color: rgba(255, 255, 255, 0.353);">
                        @if ($errors->any())
                          <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                          </div>
                        @endif

          <form action="{{ route ('posts.update', $post) }}" method="POST"> <!--INDICHI LA ROTTA NEL MOMENTO IN CUI AVVIENE IL SUBMIT -->
                @csrf
                
                @method('PUT') <!--in questo modo Laravel richiama il controller giusto, indicando come parametro il metodo da usare per mappare la rotta-->
                    <div class="row  justify-content-center mt-4">
                        <div class="form-group col-8">
                              <div class="form-group" style="font-weight:bolder; text-align:center; font-size:x-large;">
                                 <label for="title">Title</label>
                                 <input type="text" class="form-control"  name="title" id="title" value="{{$post->title}}">
                            
                              </div>
                            
                              <div class="form-group" style="font-weight:bolder; text-align:center; font-size:x-large;">
                                <label for="cover ">Cover</label>
                                <input type="text" class="form-control" name="cover" id="cover" value="{{$post->cover}}">
                              </div>
                        
                              <div class="form-group" style="font-weight:bolder; text-align:center; font-size:x-large;">
                                <label for="author ">Author</label>
                                <input type="text" class="form-control" name="author" id="author" value="{{$post->author}}" >
                              </div>
                        
                               <div class="form-group" style="font-weight:bolder; text-align:center; font-size:x-large;">
                                  <label for="content">Content</label>
                                  <textarea  class="form-control" name="content" id="date"value="{{$post->content}}" ></textarea>
                              </div>
                            
                              <div class="form-group" style="font-weight:bolder; text-align:center; font-size:x-large;">
                                  <label for="date">Date</label>
                                  <input type="date" placeholder="Date" class="form-control" name="date" id="date" value="{{$post->date}}">
                              </div>

                              <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                              </div>
                        </div> 
                    </div>      
                    
            </form>

</div>
@endsection
