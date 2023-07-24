<?php

namespace App\Http\Controllers;
use App\Models\TodoList;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    public function todo_list_create(){
        return view('ToDo_List.ToDo_Create');
    }
    
    public function todolist_insert(Request $request){
       $Todoinsert=new TodoList;
       $Todoinsert->name =$request->name;
       $Todoinsert->email =$request->email;
       $Todoinsert->marital_status=$request->marital_status;
       $Todoinsert->phone =$request->phone;
       $Todoinsert->save();
       return back();
    }
   
    public function all_member(){
        $all_list_member = TodoList::all();
        return view('ToDo_List.all_member',compact('all_list_member'));
    }
    public function member_edit($id){
     $member_edit= TodoList::findOrFail($id);
     return view('ToDo_List.member_edit',compact('member_edit'));
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
