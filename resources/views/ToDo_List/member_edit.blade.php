@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info">
                    <h4>Edit Member</h4>
                </div>

                <div class="card-body">
                  <form method="post" action="{{route('member.update',$member_edit->id)}} ">
                    @csrf
                    <div class="mb-3">
                      <label for="" class="form-label">Name</label>
                      <input type="name" name="name" class="form-control" value="{{$member_edit->name}}" >
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Email</label>
                      <input type="email" class="form-control" name="email" value="{{$member_edit->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Marital Status</label>
                        <select name="marital_status" class="form-select" value="">
                            <option value="" selected>Select Status</option>
                             <option value="Single" @if ($member_edit->marital_status=='Single')Selected @endif >Single</option>
                             <option value="Married" @if ($member_edit->marital_status=='Married')Selected @endif >Married</option>
                             <option value="Divorce" @if ($member_edit->marital_status=='Divorce')Selected @endif >Divorce</option>
                              
                        </select>
                 </div>
                    <div class="mb-3">
                        <label for="" class="form-label">phone</label>
                        <input type="number" class="form-control" name="phone" value="{{$member_edit->phone}}">
                      </div>
                     
                     
                    <button type="submit" class="btn btn-primary">Update_Member</button>
                  </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
