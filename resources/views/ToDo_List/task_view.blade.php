@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header bg-info justify-content-between d-flex">
                    <h4>Task detalis</h4>
                </div>
    
                <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th >ID</th>
                          <th >Todo Name</th>
                          <th >Status</th>
                          <th >Prioriti</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>{{1}}</td>
                          <td>{{$task_view->todorelationtotask->name}}</td>
                          <td>{{$task_view->status }}</td>
                          <td>{{$task_view->prioriti }}</td>

                        </tr>
                       
                      
                      </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
   
</div>
    
@endsection