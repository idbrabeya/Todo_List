<?php

namespace App\Http\Controllers;
use App\Models\TodoList;
use App\Models\Task;
use Illuminate\Auth\Events\validated;
use Illuminate\Http\Request;
Use \Carbon\Carbon;

class TodoListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function todo_list_create(){
    //    todo list
        if (auth()->user()->is_admin==1) {
            $todo_show=TodoList::paginate(10,['*'],'todo_show');
            
        }  else{
            $todo_show=TodoList::where('user_id',Auth()->user()->id)->paginate(10,['*'],'todo_show');
        }
// task list
        if (auth()->user()->is_admin==1) {
            $task_show=Task::paginate(5,['*'],'task_show');
        }  else{
            $task_show=Task::where('user_id',Auth()->user()->id)->paginate(5,['*'],'task_show');
        }
        return view('ToDo_List.ToDo_Create',compact('todo_show','task_show'));
    }
    
    public function todolist_insert(Request $request){
        $user_id=auth()->user()->id;
        $request->validate([
                 'name'=>'required|unique:todo_lists',
        ]);

       $Todoinsert=new TodoList;
       $Todoinsert->user_id  = $user_id;
       $Todoinsert->name =$request->name;
       $Todoinsert->description =$request->description;
       $Todoinsert->save();
       return back()->with('success', 'Todo item added successfully!');


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
        return response()->json( $todo_edit);
       
    }
    public function todo_update(Request $request){
        $request->validate([
            'name' => 'required|unique:todo_lists,name,' . $request->id,
           
        ]);

    $todo_update=ToDoList::findOrFail($request->id);
    $todo_update->name=$request->name;
    $todo_update->description =$request->description ;
    $todo_update->save();
    // return back();
    return response()->json(['status' => 'ToDoList item updated successfully']);

    }

    public function todo_delete($id){
      $task_id=Task::where('todo_id',$id)->first();
        if($task_id==null){
            TodoList::findOrFail($id)->delete();
            return response()->json(['status' => 200, 'message' => 'Deleted successfully!']);

        }else{
            // $tast_id->delete();
            // $todo_delete=Task::where('todo_id', $task_id->id)->delete();
            // $todo_delete->delete();
            // return back()->with('message','opps!this item not delete!');
            return response()->json(['status' => 403, 'message' => 'Oops! This item cannot be deleted because it has associated tasks.']);
        }
    //    return back();
       
       
    }

    public function todo_view($id){
       $todo_view = TodoList::findOrFail($id);
       return view('Todo_List.todo_view',compact('todo_view'));
    }

    public function task_list_insert(Request $request){
        $user_id=auth()->user()->id;
      
        $user_names = implode(',', $request->user_name);

        $task_insert = new Task;
        $task_insert->todo_id  = $request->todo_id;
        $task_insert->user_id  = $user_id;
        $task_insert->user_name  = $user_names;
        $task_insert->task_name  = $request->task_name;
        $task_insert->status  = $request->status ;
        $task_insert->prioriti = $request->prioriti;
        $task_insert->current_dates	 = Carbon::now()->format('d-m-Y');
        $task_insert->start_date = $request->start_date;
        $task_insert->end_date = $request->end_date;
        $task_insert->save();
        return back();


    }
    public function task_edit($id){
        $task_edit = Task::findOrFail($id);
        return response()->json($task_edit);
        // return view('ToDo_List.todo.list',compact('task_edit'));
        // return redirect()->route('todo.list',compact('task_edit'));
    }
    
    public function task_update(Request $request){
        $user_names = implode(',', $request->user_name);

        // dd($request->all());
        $task_update = Task::findOrFail($request->id);
        $task_update->todo_id = $request->todo_id;
        $task_update->task_name = $request->task_name;
        $task_update->user_name = $user_names;
        $task_update->prioriti = $request->prioriti;
        $task_update->update();
        // return back();
        return response()->json(['success'=>true]);
    }
    public function task_delete($id){
        $task_delete= Task::findOrFail($id);
        // $task_delete=Task::where('todo_id',$todo_id)->delete();
        $task_delete->delete();
        return response()->json(['status'=>'Task deleted successfully!']);
        
    }

     public function task_view($id){
        $task_view = Task::findOrFail($id);
       return view('Todo_List.task_view',compact('task_view'));
     }
    
     public function status_change(Request $request){
        // dd($request->all());
       $taskId = $request->task_id;
       $status = $request->newStatus;
       $updateStatus = Task::findOrFail($taskId);
       if($updateStatus){
         $updateStatus->status= $status;
         if($status==='completed'){
            $updateStatus->current_dates=Carbon::now()->format('d-M-Y');
         }else{
            $updateStatus->current_dates=null;
         }
         $updateStatus->save();
         return response()->json(['status' => 'status changed successfully!'],200);
       }
    
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
