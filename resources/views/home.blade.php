@extends('layouts.app')

@section('content')

<!-- Modal -->

<div class="modal fade" id="dataAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="dataAddModal">Add Member</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formReset" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="" class="form-label">Name</label>
              <input type="name" class="form-control" id="name" name="name" placeholder="type your name">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="email address">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Marital Status</label>
                <select name="marital_status" id="marital_status" class="form-select marital_status" value="">
                <option value="" selected>Select Status</option>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Divorce">Divorce</option>
            </select>
              </div>
            <div class="mb-3">
                <label for="" class="form-label">phone</label>
                <input type="number" class="form-control" id="phone" name="phone" placeholder="phone number">
              </div>
             
              <div class="mb-3">
                <label for="" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
              </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary btn-submit" id="saveMember">Add Member</button>
        </div>
      </div>
    </div>
 
 
</div>

{{-- modal end --}}

<div class="container">
  
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info justify-content-between d-flex">
                    <h4>CRUD TEST</h4>
                    <a type="button" href="{{route('info.data.show')}}" class="btn btn-warning">All Members</a>
                </div>

                <div class="card-body">
                  {{-- <form method="post" action="{{route('info.create')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="" class="form-label">Name</label>
                      <input type="name" class="form-control" name="name" placeholder="type your name">
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Email</label>
                      <input type="email" class="form-control" name="email" placeholder="email address">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Marital Status</label>
                        <select name="marital_status" class="form-select" value="">
                        <option value="" selected>Select Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorce">Divorce</option>
                    </select>
                      </div>
                    <div class="mb-3">
                        <label for="" class="form-label">phone</label>
                        <input type="number" class="form-control" name="phone" placeholder="phone number">
                      </div>
                     
                      <div class="mb-3">
                        <label for="" class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" accept="image/*">
                      </div>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#dataAddModal">Add_Info</a>
                  </form> --}}
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dataAddModal">Add_Info</button>

                </div>
            </div>
        </div>
    </div>
 
</div>


@endsection
@section('scripts')
  <script>
    $(document).ready(function() {
      
      $('#saveMember').click (function () {
        // console.log("hello");
          var data =new FormData();
          data.append('name',$('#name').val());
          data.append('email',$('#email').val());
          data.append('phone',$('#phone').val());
          data.append('image',$('#image')[0].files[0]);
          data.append('marital_status',$('#marital_status').val());
         
          // 'name':$('.name').val(),
          // 'email':$('.email').val(),
          // 'phone':$('.phone').val(),
          // 'image':$('.image')[0].files[0],
          // 'marital_status':$('.marital_status').val(),
        //
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
               });

        $.ajax({
          type :"POST",
          url :"/info_create",
          data:data,
          dataType:"json",
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          success:function(response){
            console.log(response);
            $('#dataAddModal').modal('hide');

          },
          error:function(xhr){
            console.log(xhr.responseTest);
          }
        });
    
      });
    });
  </script>
@endsection
