@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard <a href="" data-toggle="modal" data-target="#exampleModal"    class="btn btn-primary btn-sm float-right">Add Neww</a></div>
                   <a href="{{route('newspost')}}" class="btn btn-sm float-right text-white bg-dark">News Post</a>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    @php
                     $posts=App\Post::all();
                    @endphp

                                               <table class="table table-striped table-dark">
                                                  <thead>
                                                    <tr>
                                                      <th scope="col">Id</th>
                                                      <th scope="col">Title</th>
                                                      <th scope="col">Author</th>
                                                      <th scope="col">Description</th>
                                                      <th scope="col">Tag</th>
                                                      <th scope="col">Action</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    @foreach($posts as $row)
                                                    <tr>
                                                      <th scope="row">{{$row->id}}</th>
                                                      <td>{{$row->title}}</td>
                                                      <td>{{$row->author}}</td>
                                                      <td>{{$row->description}}</td>
                                                      <td>{{$row->id}}</td>
                                                      <td>
                                                      <a href="{{url('editpost/'.$row->id)}}" class="btn btn-primary">Edit</a>   
                                                      <a href="{{url('deletecontact/'.$row->id)}}" class="btn btn-success" id="delete">Delte</a>  
                                                      <a href="" class="btn btn-danger">View</a>    
                                                      </td>
                                                    </tr>
                                                    @endforeach
                                                  </tbody>
                                   </table>
                   
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Data INSERTION ARE HERE Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                   
    <form method="post" action="{{url('insert-post')}}">
        @csrf
      <div class="modal-body">
       
              <div class="form-group">
                <label for="exampleFormControlInput1">Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Title"
                name="title">
              </div>
               <div class="form-group">
                <label for="exampleFormControlInput1">Author</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Author" name="author">
              </div>
               <div class="form-group">
                <label for="exampleFormControlInput1">Tag</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tag" name="tag">
              </div>
              
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
              </div>

      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary">submit</button>
      </div>

      </form>
     
    </div>
  </div>
</div>
@endsection
