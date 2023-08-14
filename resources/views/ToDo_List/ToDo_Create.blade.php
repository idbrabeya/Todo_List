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

                    @if($errors->has('name'))
                   <span class="text-danger">
                  {{$errors->first('name')}}
                   </span>
                    @endif

                    <div class="mb-3">
                      <label for="" class="form-label">Description</label>
                      <textarea name="description" id="" cols="40" class="form-control"></textarea>
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
                      <tr>
                        <td colspan="5">
                          <div class="div">
                            <span class="text-danger text-center">ToDo List Emty</span>
                          </div>
                        </td>
                      </tr>
                        
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
                     <select name="todo_id" id="" class="form-control form-select">
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
                      <div class="row">
                        <div class="col-6">
                          <div class="mb-3">
                            <label for="" class="form-label">Start Date</label>
                            <input type="date" class="form-control" name="start_date" >
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="mb-3">
                            <label for="" class="form-label">End Date</label>
                            <input type="date" class="form-control" name="end_date" >
                          </div>
                        </div>
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
                      <th >Target Date</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($task_show as $key=>$task_shows)

                    <tr>
                      <input type="hidden" class="button_delete" value="{{$task_shows->id}}">
                      <td>{{$key+1}}</td>
                      <td>{{$task_shows->todorelationtotask->name}}</td>
                      <td>
                        {{$task_shows->status}}
                      </td>
                      <td>{{$task_shows->prioriti}}</td>
                      <td>{{$task_shows->end_date}}</td>
                     
                      <td>
                        <button class="btn btn-info btn-sm button_edit" value="{{$task_shows->id}}" type="button" data-bs-target="#myModaltask" data-bs-toggle="modal">Edit</button>

                          <button type="submit"class="btn btn-danger btn-sm show_confirm">Delete</button>
                    
                        <a href="{{route('task_view',$task_shows->id)}}" class="btn btn-warning btn-sm">View</a>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="5">
                        <div class="div">
                          <span class="text-danger text-center">Task List Emty</span>
                        </div>
                      </td>
                    </tr>
                  
                     
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

{{-- modal edit task --}}
{{-- id="editForm" action="{{ route('task.upda', $tetask_edit->id) }}" method="post" --}}
<div class="modal fade" id="myModaltask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModaltask">Edit Tasks</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editForm" action="" method="post">
          @csrf
          <div class="mb-3">
            <label for="" class="form-label">Todo Name</label>
           <select name="edit_todo_id" id="todo_name" class="form-control form-select">
            <option value="">select</option>
            @foreach (App\Models\TodoList::all() as $todo_name)
            {{-- <option id="" value="{{$todo_name->id}}" @if($task_shows->todo_id==$todo_name->id) selected @endif>{{$todo_name->name}}</option> --}}
            <option id="" value="{{$todo_name->id}}" @if(old('edit_todo_id',$task_shows->todo_id)==$todo_name->id) selected @endif>{{$todo_name->name}}</option>

            @endforeach
           </select>
          </div>
          <div class="mb-3">
           <label for="" class="form-label ">Status</label>
           <select name="status" id="status_name" class="form-control form-select">
             <option value="select">Select</option>
             <option value="completed" @if($task_shows->status=="completed") selected @endif>Completed</option>
             <option value="progress" @if($task_shows->status=="progress") selected @endif>In Progress</option>
             <option value="Not_Started" @if($task_shows->status=="Not_Started") selected @endif>Not Started</option>
           </select>
         </div>

          <div class="mb-3">
            <label for="" class="form-label ">Prioriti</label>
            <select name="prioriti" id="prioriti_name" class="form-control form-select">
             <option value="select" >Select</option>
             <option value="high" @if ($task_shows->prioriti =='high') selected @endif>High</option>
             <option value="medium" @if ($task_shows->prioriti =='medium') selected @endif>Medium</option>
             <option value="low" @if ($task_shows->prioriti =='low') selected @endif>Low</option>
           </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn-submit">Update</button>
      </div>
    </div>
  </div>

</div>
@endsection

@section('scripts')
{{-- delete sweetalert --}}
<script>
 $(document).ready(function () {
    $('.show_confirm').click(function(el){
        el.preventDefault();
        var buttonId = $(this).closest("tr").find('.button_delete').val();

        Swal.fire({
            title: 'Are you sure to delete this task?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
           
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'get',
                    url: '/task/delete/' + buttonId,
                    // data:{
                    //          id: buttonId
                    //        },
                    success: function (response) {
                        Swal.fire({
                            title: response.status,
                            icon: "success",
                        }).then((result) => {
                            location.reload();
                        });
                    },
                    error: function (xhr, status, error) {
                        Swal.fire({
                            title: 'Error',
                            text: 'An error occurred while deleting the item.',
                            icon: 'error',
                        });
                    }
                });
            }
        });
    });
});

  // $('.show_confirm').click(function(event) {
  //      var form =  $(this).closest("form");
  //      var name = $(this).data("name");
  //      event.preventDefault();
  //      swal({
  //          title: `Are you sure you want to delete this record?`,
  //          text: "If you delete this, it will be gone forever.",
  //          icon: "warning",
  //          buttons: true,
  //          dangerMode: true,
  //      })
  //      .then((willDelete) => {
  //        if (willDelete) {
  //          form.submit();
  //        }
  //      });
  //  });
</script>

{{-- edit data --}}

@endsection