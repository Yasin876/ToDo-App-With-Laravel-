@extends('layouts.app')

@section('title')
    Todos List
@endsection

@section('content')



    <div class="row justfy-content-center">
        <div class="col-md-8 offset-md-2">

         <div class="card card-default">
             <div class="card-header" >
              <h3 class="text-center my-5">ToDo List</h3>
             </div>

             <div class="card-body">

                 <ul class="list-group">
                
                     @foreach ($todos as $todo)
                     <li class="list-group-item">
                         

                         @if ($todo->completed)
                         <p style="text-decoration: line-through; display:inline;">{{$todo->name}} </p> 
                         @else
                             <a href="/todos/{{$todo->id}}/complete" class="btn btn-warning btn-sm float-right ml-2">Complete</a>
                             <p style="display: inline"> {{$todo->name}} </p>
                         @endif

                             
                         <a href="/todos/{{$todo->id}}" class="btn btn-primary btn-sm float-right">Details</a>
                     
                     </li>
                        
                     @endforeach
                 
                    </ul>
         
                </div>
         


        </div>


    </div>

</div>



  
@endsection
  
 
     
   