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
                              <th >Email</th>
                              <th >Marital_Status</th>
                              <th >Phone</th>

                            </tr>
                          </thead>
                     
                          <tbody>
                            
                            <tr>
                                <td>{{1}}</td>
                                 <td>{{$member_view->name}}</td>
                                 <td>{{$member_view->email}}</td>
                                 <td>{{$member_view->marital_status}}</td>
                                 <td>{{$member_view->phone}}</td>
                
                               </tr>
                    
                           
                           
                          </tbody>
                          
                  </table>
                </div>
            </div>
        </div>
    </div>
@endsection

