@extends('layouts.app')

@section('title')
    Single todo : {{$specificToDo->name}}
@endsection

@section('content')


    <h1 class="text-center my-5">
        {{$specificToDo->name}}
    </h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card card-default">
              <div class="card card-header">
                  Details
              </div>
          </div>
        
          <div class="card card-body">
              {{$specificToDo->description}}

              
          </div>

        <a href="/todos/{{$specificToDo->id}}/edit" class="btn btn-info my-3" >Edit</a>
        <a href="/todos/{{$specificToDo->id}}/delete" class="btn btn-danger my-3 ml-5" >Delete</a>

       
        </div>

    </div>

   



    
@endsection
  
  

  
