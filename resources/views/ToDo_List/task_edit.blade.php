@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header bg-info justify-content-between d-flex">
                    <h4>Task Edit</h4>
                    {{-- <a type="button" href="{{route('all.member')}}" class="btn btn-warning">ToDo</a> --}}
                </div>
  
                <div class="card-body">
                  <form action="{{route('task.update',$task_edit->id)}}" method="post">
                      @csrf

                      <div class="mb-3">
                        <label for="" class="form-label">Todo Name</label>
                       <select name="todo_id" id="" class="form-control">
                        <option value="">select</option>
                        @foreach (App\Models\TodoList::all() as $todo_name)
                        <option id="" value="{{$todo_name->id}}" @if($task_edit->todo_id==$todo_name->id) selected @endif>{{$todo_name->name}}</option>

                        @endforeach
                       </select>
                      </div>

                      <div class="mb-3">
                       <label for="" class="form-label ">Status</label>
                       <select name="status" id="" class="form-control form-select">
                         <option value="select">Select</option>
                         <option value="completed" @if($task_edit->status=="completed") selected @endif>Completed</option>
                         <option value="progress" @if($task_edit->status=="progress") selected @endif>In Progress</option>
                         <option value="Not_Started" @if($task_edit->status=="Not_Started") selected @endif>Not Started</option>
                       </select>
                     </div>
                      <div class="mb-3">
                        <label for="" class="form-label ">Prioriti</label>
                        <select name="prioriti" id="" class="form-control form-select">
                         <option value="select" >Select</option>
                         <option value="high" @if ($task_edit->prioriti =='high') selected @endif>High</option>
                         <option value="medium" @if ($task_edit->prioriti =='medium') selected @endif>Medium</option>
                         <option value="low" @if ($task_edit->prioriti =='low') selected @endif>Low</option>
                       </select>
                      </div>
         
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
               </div>
            </div>
        </div>
    </div>
</div>
    
@endsection