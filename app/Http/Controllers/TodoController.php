<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Todo;

class TodoController extends Controller
{
    
    /**Display Todo action information */
    public function index(){

        /** Use the relationship to get all todo of the authenticated user */
        $todo = auth()->user()->todos;

       /** Store user id in $id*/
        $id = auth()->user()->id;

        /** Use the id to pluck created_at, updated_at and deleted_at column */
        $created_at = Todo::where('user_id',$id)->pluck('created_at');

        $updated_at = Todo::where('user_id',$id)
         ->whereColumn('updated_at','>','created_at')->pluck('updated_at');
         
        $deleted_at = Todo::withTrashed()
            ->where('user_id',$id)
            ->where('deleted_at','!=',null)
            //->where('deleted_at','!=','')
            ->pluck('deleted_at');

        /** Return View of admin dashboard with the data */
        return view('admin.dashboard')
        ->with('todo', $todo)
        ->with('created_at', $created_at)
        ->with('updated_at', $updated_at)
        ->with('deleted_at', $deleted_at);
    }

    /** Display form to create todo */
    public function create(){
        return view('admin.createTodo');
    }

    /** Store incoming request data */
    public function createTodo(){

        /**Validate whats coming in */
        $this->validate(request(), array(
        'name' => 'required',
        'title' => 'required',
        'description' => 'required'
        ));

        /** Create a variable to store user id */
        $user_id = auth()->user()->id;

        /** Create an instance of the model and save data */
        $todo = new Todo();

        $todo->name = request()->name;
        $todo->title = request()->title;
        $todo->description = request()->description;
        $todo->user_id = $user_id;

        $todo->save();

        session()->flash('success_report', 'Todo Created Successfully');
    
        return back();
    }

    /** Display User's created Todo */
    public function listTodo(){

        /**Store user's todo in $todos */
        $todos = auth()->user()->todos;

        return view('admin.listTodo')
        ->with('todos', $todos);   
    }
    

    /** Populate form with to do data to update */
    public function editTodo(Request $request){
        
        /** Store the id in $id */
        $id = $request->id;
        
        /** Use id to find todo to edit */
        $todo = Todo::find($id);
        
        return view('admin.editTodo')
         ->with('todo', $todo);
    }

    /** Update and store todo data in the database */
    public function editConfirm(){

        /**Store incoming id in $id */
        $id = request()->id;

        /** Use it to find data to update */
        $todo = Todo::find($id);

        $todo->name = request()->name;
        $todo->title = request()->title;
        $todo->description = request()->description;

        $todo->save();

       session()->flash('success_report', 'Todo Updated Successfully');
    
        return back();
        
    }
    

    /** Get Incoming Id and delete Todo */
    public function deleteTodo($id){

        /**Store id in a variable */
        $id = request()->id;

        $data = Todo::find($id);

        $data->delete();

        session()->flash('success_report', 'Todo Deleted Successfully');
    
        return back();  
    }
    
}