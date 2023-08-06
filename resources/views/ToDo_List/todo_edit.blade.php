@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header bg-info">
                    <h4>TODO Edit</h4>
                    
                </div>

                <div class="card-body">
                  <form method="post" action="{{route('todo_update',$todo_edit->id)}}">
                    @csrf
                    <div class="mb-3">
                      <label for="" class="form-label">Title</label>
                      <input type="text" class="form-control" name="name" value="{{$todo_edit->name}}">
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Description</label>
                      <textarea name="description" id="" cols="60" >{{$todo_edit->description}}</textarea>
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
                      <button type="submit" class="btn btn-primary">ToDo_Update</button>
                  </form>
                  

                </div>
            </div>
        </div>
       

    </div>
</div>
    
@endsection