<?php

namespace App\Http\Controllers;
use App\Models\TodoList;
use App\Models\Task;
use Illuminate\Auth\Events\validated;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function todo_list_create(){
        $todo_show=TodoList::all();
        $task_show=Task::all();
        return view('ToDo_List.ToDo_Create',compact('todo_show','task_show'));
    }
    
    public function todolist_insert(Request $request){

        $request->validate([
                 'name'=>'required|unique:todo_lists',
        ]);

       $Todoinsert=new TodoList;
       $Todoinsert->name =$request->name;
       $Todoinsert->description =$request->description;
       $Todoinsert->email =$request->email;
       $Todoinsert->marital_status=$request->marital_status;
       $Todoinsert->phone =$request->phone;
       $Todoinsert->save();
       return back();
    }
   
    // public function all_member(){
    //     $all_list_member = TodoList::all();
    //     return view('ToDo_List.all_member',compact('all_list_member'));
    // }
    public function member_edit($id){
     $member_edit= TodoList::findOrFail($id);
     return view('ToDo_List.member_edit',compact('member_edit'));
    }
    public function todo_edit($id){
        $todo_edit = TodoList::findOrFail($id);
        return view('ToDo_List.todo_edit',compact('todo_edit'));
    }
    public function todo_update(Request $request,$id){
        $todo_update=ToDoList::findOrFail($id);
        $todo_update->name=$request->name;
        $todo_update->description =$request->description ;
        $todo_update->save();
        return redirect()->route('todo.list');

    }

    public function todo_delete($id){
        
        Task::where('todo_id',$id)->delete();
        TodoList::findOrFail($id)->delete();
        // $todo_delete=Task::where('todo_id',$todo_delete->id)->delete();
        // $todo_delete->delete();
        return back();
    }

    public function todo_view($id){
       $todo_view = TodoList::findOrFail($id);
       return view('Todo_List.todo_view',compact('todo_view'));
    }

    public function task_list_insert(Request $request){
        // dd($request->all());
        $task_insert = new Task;
        $task_insert->todo_id  = $request->todo_id;
        $task_insert->status  = $request->status ;
        $task_insert->prioriti = $request->prioriti;
        $task_insert->save();
        return back();


    }
    public function task_edit($id){
        $task_edit = Task::findOrFail($id);
        return view('ToDo_List.task_edit',compact('task_edit'));
    }

    public function task_update(Request $request, $id){
        // dd($request->all());
        $task_update = Task::findOrFail($id);
        $task_update->todo_id  = $request->todo_id;
        $task_update->status  = $request->status ;
        $task_update->prioriti = $request->prioriti;
        $task_update->save();
        return redirect()->route('todo.list');
    }
    public function task_delete($id){
        $task_delete= Task::findOrFail($id);
        // $task_delete=Task::where('todo_id',$todo_id)->delete();
        $task_delete->delete();
        return back();
    }

     public function task_view($id){
        $task_view = Task::findOrFail($id);
       return view('Todo_List.task_view',compact('task_view'));
     }

     public function todo_list_view(){
        $todo_list_view= Task::all();
        return view ('ToDo_List.todo_list',compact('todo_list_view'));
     }
    public function member_update(Request $request, $id){
        // dd($request->all());
        $member_update = TodoList::findOrFail($id);
        $member_update->name = $request->name;
        $member_update->email = $request->email;
        $member_update->marital_status = $request->marital_status;
        $member_update->phone = $request->phone;
        $member_update->save();
        return redirect()->route('all.member');
    }
    public function member_view(Request $request,$id){
        $member_view=TodoList::findOrFail($request->id);
        return view('ToDo_List.member_view',compact('member_view'));
    }
    public function member_delete($id){
        $member_delete = TodoList::find($id);
        $member_delete->delete();
        return back();
    }
}
