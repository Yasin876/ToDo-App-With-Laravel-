<?php

namespace App\Http\Controllers;

use App\Todo; //Todo model sınıfı üzerinden veritabanı islemleri icin 
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    public function index(){
        //fetch all todos from database 
        //display them into todos.index blade page 

        $todos = Todo::all();

        return view('todos.index')->with('todos' , $todos); //index.blade dondurulur 
    }

  /*  public function show($todoId){
    // dd($todoId);

     //to fetch specific id from database 
     $todo = Todo::find($todoId); //Todo model sınıfı uzerinden id yi cektik , bu id ye sahip satır verilerini cek
     return view('todos.show')->with('specificToDo' , $todo); //todoId anahtarı ile $todo icerisine atılan verileri sayfaya gönderiyorum.
    } */

    public function show(Todo $todo){ //surekli tekrarı onlemek icin Todo model sınıfından bir degisken olusturulur ve laravel otomatil olarak veritabanında bu degiskene ait verileri bulur 
        // dd($todoId);
    
         //to fetch specific id from database 
       // $todo = Todo::find($todo); //Todo model sınıfı uzerinden id yi cektik , bu id ye sahip satır verilerini cek
         return view('todos.show')->with('specificToDo' , $todo); //todoId anahtarı ile $todo icerisine atılan verileri sayfaya gönderiyorum.
        }

    public function create(){
        return view('todos.create'); //sadece formu dondurduk , depolama islemi asagıda 
    }

    public function store(){
     //validate ,dogrulama
     $this->validate(request() , [
         'name'=>'required|min:6|max:100', //min 6 maximum 100 karakter girdi almak icin.
         'description'=>'required'
     ]);


      //  dd( request()->all() );
      $data = request()->all(); //forma girilen veriler request metoduyla $data degiskenine aktarılıyor
      $todo = new Todo(); // Todo model sınıfından yeni bir nesne olusturuluyor.

      $todo->name = $data['name']; //veritabanı name kolonuna forma girilen veri aktarılıyor.
      $todo->description = $data['description'];
      $todo->completed = false; //tum satırlara veri girilmesi grekiyor



      //save to database
      $todo->save();

      //flash messaging 
      session()->flash('success' , 'Todo created successfully');

      //when done all process , redirect to any page 
      return redirect('/todos');



    }

  /*  public function edit($editID){ //for update 
       $todo = Todo::find($editID);

       return view('todos.edit')->with('todo',$todo); //we send all data in $todo through with todo key , to edit.blade.php


    } */

    public function edit(Todo $todo){
        //veritabanından verileri cekmek icin find() fonksiyonu kullanmaya gerek kalmadı laravel otomatik olarak $todo ile bunları getirir.
        return view('todos.edit')->with('todo',$todo);
    }




    public function update($todoId){

        $this->validate(request() , [
            'name'=>'required|min:6|max:100', //min 6 maximum 100 karakter girdi almak icin.
            'description'=>'required'
        ]);

        //form üzerindeki girdileri almak icin 
        $data = request()->all();

        $todo = Todo::find($todoId);//belirtilen id ye ait degerler bulundu
        $todo->name = $data['name'];//form uzerindeki name database deki isme yerlestirildi.
        $todo->description = $data['description'];
        $todo->save();

         //flash messaging 
        session()->flash('success' , 'Todo updated successfully');

        return redirect('/todos');

    }

    public function destroy($todoId){ // {todo} parametre olarak buraya gecer 

        $todo = Todo::find($todoId);

        $todo->delete();

         //flash messaging 
        session()->flash('success' , 'Todo deleted successfully');

        return redirect('/todos');

    }


    public function complete(Todo $todo){//laravel fecth automaclly id from database
        $todo->completed = true;
        $todo->save();
        session()->flash('success','Todo completed successfully');
        return redirect('/todos');

    }
}
