@extends('layouts.app')
@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-6 mx-auto">
              <div class="card">
                  <div class="card-header">
                   <h4>ToDo Project</h4>
                  </div>
                  <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">Title</th>
                            <th scope="col">Status</th>

                          </tr>
                        </thead>
                        <tbody>
                           @foreach ($todo_list_view as $key=>$todo_list_views)
                           <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{$todo_list_views->todorelationtotask->name  }}</td>
                            <td>
                            {{-- <input type="hidden" class="taskId" value="{{ $todo_list_views->id }}"> --}}
                              <select name="status" class="dropdown" onchange="statusChange(this,{{$todo_list_views->id}})">
                                <option @if($todo_list_views->status == 'completed') selected @endif value="completed">Completed</option>
                                <option  @if($todo_list_views->status == 'progress') selected @endif value="progress">In Progress</option>
                                <option  @if($todo_list_views->status == 'Not_Started') selected @endif value="Not_Started">Not Started</option>
                            </select>
                            
                                 {{-- @if ($todo_list_views->status =='completed')<span class="badge bg-success">{{ $todo_list_views->status }}</span>
                                  @elseif ($todo_list_views->status =='progress')<span class="badge bg-warning">{{ $todo_list_views->status }}</span>
                                 @else
                                 <span class="badge bg-danger">{{ $todo_list_views->status }}</span>
                                 @endif --}}
                               
                             
                           
            
                             {{-- <span id="statusBadge{{ $key }}" class="badge
                             @if ($todo_list_views->status == 'completed') bg-success
                             @elseif ($todo_list_views->status == 'progress') bg-warning
                             @else bg-danger @endif">
                             {{ $todo_list_views->status }}
                         </span>
                         <select onchange="updateStatus({{ $key }}, this.value)">
                             <option value="completed">Completed</option>
                             <option value="progress">In Progress</option>
                             <option value="Not_Started">Not Started</option>
                         </select> --}}
                            </td>
                          </tr>
                           @endforeach
                           {{--{{$all_contact_tasks->status  }} --}}

                        </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <script>
    function statusChange(el){
    var selectedValue = el.value;
    var taskId = el.parentNode.querySelector('.taskId').value;
    var taskId = selectElement.parentNode.querySelector('.taskId').value;

    alert(taskId);
    console.log('Selected Value:', selectedValue);
    console.log('Task ID:', taskId);
      
    // var taskId = document.getElementById("taskId").value;
 
    
 
//      $.ajax({
//        headers: {
//                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//            },
//        url: '{{ route('status.change') }}',
//        type: 'POST',
//        data: {
//            status: selectedValue,
//            taskId: taskId,
//        },
 
//        success:function(response){
//            console.log("update");
//        },
//        error:function(error){
//            console.log("not update",error);
//        }
//    });
     }
 </script>
 

  {{-- <script>
    function updateStatus(key, selectedValue) {
        var statusBadge = document.getElementById("statusBadge" + key);
        statusBadge.textContent = selectedValue;
    
        if (selectedValue == 'completed') {
            statusBadge.className = "badge bg-success";
        } else if (selectedValue == 'progress') {
            statusBadge.className = "badge bg-warning";
        } else {
            statusBadge.className = "badge bg-danger";
        }
    
    }
    </script> --}}
@endsection
