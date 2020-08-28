@extends('layouts.app')

@section('content')

<h1 class="text-center">
    Create Todos
</h1>

<div class="row justify-content-center">
    <div class="col-md-8">
       <div class="card card-default">
           <div class="card-header">
               Create New Todo
           </div>
           <div class="card-body">
               <!--error message-->
               @if ($errors->any())
               <div class="alert alert-danger">
                   <div class="list list-group">
                    @foreach ($errors->all() as $error)
                       <div class="list-group-item">
                           {{$error}}
                       </div>
                    @endforeach

                   </div>
                 
               </div>
                   
               @endif
            <form action="/update-todos/{{$todo->id}}/update" method="POST">
                @csrf

                <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="todo name" value="{{$todo->name}}">
                </div>

                <div class="form-group">
                    <textarea name="description"  cols="30" rows="10" class="form-control" placeholder="details..."  > {{$todo->description}} </textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="submit">Save Changes</button>
                </div>

                
            </form>
           </div>
       </div>
    </div>
</div>
    
@endsection