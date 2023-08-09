@extends('layouts.app')
@section('content')
<div class="container">
  
    <div class="row ">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header bg-info justify-content-between d-flex">
                    <h4>TODO CREATE</h4>
                    {{-- <a type="button" href="{{route('all.member')}}" class="btn btn-warning">ToDo</a> --}}
                </div>

                <div class="card-body">
                  <form method="post" action="{{route('todolist.insert')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="" class="form-label">Title</label>
                      <input type="text" class="form-control" name="name" >
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Description</label>
                      <textarea name="description" id="" cols="40"></textarea>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="" class="form-label">Marital Status</label>
                        <select name="marital_status" class="form-select" value="">
                        <option value="" selected>Select Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorce">Divorce</option>
                    </select>
                      </div> --}}
                    {{-- <div class="mb-3">
                        <label for="" class="form-label">phone</label>
                        <input type="number" class="form-control" name="phone" placeholder="phone number">
                      </div> --}}
                     
                      {{-- <div class="mb-3">
                        <label for="" class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" accept="image/*">
                      </div> --}}
                      <button type="submit" class="btn btn-primary">Add_ToDo</button>
                  </form>
                  

                </div>
            </div>
        </div>
        {{-- table --}}

        <div class="col-md-7">
          <div class="card">
              <div class="card-header bg-info justify-content-between d-flex">
                  <h4>TODO LIST</h4>
              </div>

              <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th >ID</th>
                        <th >Title</th>
                        <th >Description</th>
                        <th >Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($todo_show as $key=>$todo)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$todo->name}}</td>
                        <td>{{$todo->description}}</td>
                        <td>
                          <a href="{{route('todo.edit', $todo->id) }}" class="btn btn-info btn-sm">Edit</a>
                          <a href="{{route('todo_delete', $todo->id) }}"  class="btn btn-danger btn-sm">Delete</a>
                          <a href="{{route('todo_view',$todo->id)}}" class="btn btn-warning btn-sm">View</a>
                        </td>
                      </tr>
                      @empty
                        <div class="div">
                          <span>dff</span>
                        </div>
                      @endforelse
                    </tbody>
                </table>
              </div>
          </div>
      </div>
    </div>
 

    {{-- task table --}}

    <div class="row mt-4">
      <div class="col-md-5">
          <div class="card">
              <div class="card-header bg-info justify-content-between d-flex">
                  <h4>Task CREATE</h4>
                  {{-- <a type="button" href="{{route('all.member')}}" class="btn btn-warning">ToDo</a> --}}
              </div>

              <div class="card-body">
                <form action="{{route('task.list.insert')}}" method="post">
                    @csrf
                    <div class="mb-3">
                      <label for="" class="form-label">Todo Name</label>
                     <select name="todo_id" id="" class="form-control">
                      <option value="" selected>select</option>
                      @foreach ($todo_show as $todo_shows)
                      <option value="{{$todo_shows->id}}">{{$todo_shows->name }}</option>
                      @endforeach
                     </select>
                    </div>
                    <div class="mb-3">
                     <label for="" class="form-label ">Status</label>
                     <select name="status" id="" class="form-control form-select">
                       <option value="">Select</option>
                       <option value="completed">Completed</option>
                       <option value="progress">In Progress</option>
                       <option value="Not_Started">Not Started</option>
                      
                     </select>
                   </div>
                    <div class="mb-3">
                      <label for="" class="form-label ">Prioriti</label>
                      <select name="prioriti" id="" class="form-control form-select">
                       <option value="select">Select</option>
                       <option value="high">High</option>
                       <option value="medium">Medium</option>
                       <option value="low">Low</option>
                     </select>
                    </div>
       
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
             </div>
          </div>
      </div>
      {{-- table --}}

      <div class="col-md-7">
        <div class="card">
            <div class="card-header bg-info justify-content-between d-flex">
                <h4>Task List</h4>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th >ID</th>
                      <th >Todo Name</th>
                      <th >Status</th>
                      <th >Prioriti</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($task_show as $key=>$task_shows)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$task_shows->todorelationtotask->name}}</td>
                      <td>{{$task_shows->status}}</td>
                      <td>{{$task_shows->prioriti}}</td>
                     
                      <td>
                        <a href="{{route('task.edit',$task_shows->id)}}" class="btn btn-info btn-sm">Edit</a>
                        <a href="{{route('task.delete',$task_shows->id)}}"  class="btn btn-danger btn-sm">Delete</a>
                        <a href="{{route('task_view',$task_shows->id)}}" class="btn btn-warning btn-sm">View</a>
                      </td>
                    </tr>
                    @empty
                      <div class="div">
                        <span>dff</span>
                      </div>
                    @endforelse
                  </tbody>
              </table>
            </div>
        </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-md-12 ">
      <a href="{{route('todo.list.view')}}" class="btn btn-success">ToDo Project</a>

    </div>
  </div>

</div>
@endsection