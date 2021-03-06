
@extends('layouts.app')

@section('content')
        <div class="container-create" style=" background-color: rgba(255, 255, 255, 0.353);">
        
                        @if ($errors->any())
                          <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                          </div>
                        @endif

                        <div style="text-align: center;font-weight:bolder;font-style:oblique;" mb-2>
                           <h3>Aggiungi un nuovo post</h3>
                        </div>

            <form action="{{ route ('posts.store') }}" method="POST"> <!--INDICHI LA ROTTA NEL MOMENTO IN CUI AVVIENE IL SUBMIT -->
                @csrf
                    <div class="row  justify-content-center mt-4">
                    
                        <div class="form-group col-8">
                              <div class="form-group" style="font-weight:bolder; text-align:center; font-size:x-large;" >
                                 <label for="title" >Title</label>
                                 <input type="text" class="form-control"  name="title" id="title">
                            
                              </div>

                             <div class="form-group"> <!--select al value passi id e come testo intermo il category->name-->
                                  <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                          <label class="input-group-text" for="category_id">Options</label>
                                      </div>
                                      <select class="custom-select" id="category_id" name="category_id">
                                          <option selected>Choose...</option>
                                          @foreach($categories as $category)
                                              <option value="{{$category->id}}">{{ $category->name }}</option>
                                          @endforeach
                                      </select>
                                  </div>
                              </div>
                            
                              <div class="form-group" style="font-weight:bolder; text-align:center; font-size:x-large;" >
                                <label for="cover ">Cover</label>
                                <input type="text" class="form-control" name="cover" id="cover">
                              </div>
                        
                              <div class="form-group" style="font-weight:bolder; text-align:center; font-size:x-large;">
                                <label for="cover ">Author</label>
                                <input type="text" class="form-control" name="author" id="author">
                              </div>
                        
                               <div class="form-group" style="font-weight:bolder; text-align:center; font-size:x-large;">
                                  <label for="date">Content</label>
                                  <textarea  class="form-control" name="content" id="date"></textarea>
                              </div>
                            
                              <div class="form-group" style="font-weight:bolder; text-align:center; font-size:x-large;">
                                  <label for="date">Date</label>
                                  <input type="date" placeholder="Date" class="form-control" name="date" id="date">
                              </div>

                              <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                              </div>
                        </div> 
                    </div>             
             </form>

        </div>
 @endsection