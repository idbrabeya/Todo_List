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
                            @if ($todo_list_views->status =='completed')<span class="badge bg-success">{{ $todo_list_views->status }}</span>
                             @elseif ($todo_list_views->status =='progress')<span class="badge bg-warning">{{ $todo_list_views->status }}</span>
                            @else
                            <span class="badge bg-danger">{{ $todo_list_views->status }}</span>
                            @endif


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
@endsection
