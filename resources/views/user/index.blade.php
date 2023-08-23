@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-8 mx-auto">
              <div class="card">
                  <div class="card-header bg-info justify-content-between d-flex">
                      <h4>USER LIST</h4>
                  </div>
      
                  <div class="card-body">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th >ID</th>
                            <th >User Name</th>
                            <th >Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse ($user_names as $key=>$user_name)
      
                          <tr>
                            <td>{{($key+1) + ($user_names->currentPage() - 1)*$user_names->perPage() }}</td>
                            <td>{{$user_name->name}}</td>

                            <td>
                              <a class="btn btn-primary btn-sm"  type="button" id="" name="">Edit</a>
                            
                               <button type="submit"class="btn btn-danger btn-sm">Delete</button>
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
                    {{$user_names->links()}}
                  </div>
              </div>
          </div>
        </div>
    </div>
@endsection