@extends('layouts.app')
@section('content')
<div class="container">
  
    <div class="row justify-content-start">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-info justify-content-between d-flex">
                    <h4>TODO LIST</h4>
                    <a type="button" href="{{route('all.member')}}" class="btn btn-warning">All Members</a>
                </div>

                <div class="card-body">
                  <form method="post" action="{{route('todolist.insert')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="" class="form-label">Title</label>
                      <input type="text" class="form-control" name="title" >
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Description</label>
                      <input type="text" class="form-control" name="description" placeholder="">
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
                      <button type="submit" class="btn btn-primary">Add_Member</button>
                  </form>
                  

                </div>
            </div>
        </div>
    </div>
 
</div>
@endsection