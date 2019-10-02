@extends('layouts.app')
@section('content')
<div class="container">
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
      <a href="" class="btn btn-primary">Edit</a>	
      <a href="" class="btn btn-success">Delte</a>	
      <a href="" class="btn btn-danger">View</a>	
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

</div>
@endsection