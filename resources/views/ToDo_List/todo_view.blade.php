@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                <table class="table">
                        <thead class="">
                            <tr class="bg-info">
                              <th >Id</th>
                              <th >Nmae</th>
                              <th >Description</th>
                              

                            </tr>
                          </thead>
                     
                          <tbody>
                            
                            <tr>
                                <td>{{1}}</td>
                                 <td>{{$todo_view->name}}</td>
                                 <td>{{$todo_view->description}}</td>
                    
                               </tr>
                    
                           
                           
                          </tbody>
                          
                  </table>
                </div>
            </div>
        </div>
    </div>
@endsection

