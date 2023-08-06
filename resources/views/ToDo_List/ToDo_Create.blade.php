@extends('layouts.app')
@section('content')
<div class="container">
  
    <div class="row ">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header bg-info justify-content-between d-flex">
                    <h4>TODO CREATE</h4>
                    <a type="button" href="{{route('all.member')}}" class="btn btn-warning">ToDo</a>
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
                          <button type="button" class="btn btn-danger btn-sm deletedata">Delete</button>
                          <a href="" class="btn btn-warning btn-sm">View</a>
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
 
</div>
@endsection