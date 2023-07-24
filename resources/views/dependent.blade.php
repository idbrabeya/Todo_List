@extends('layouts.app')

@section('content')

<!-- Modal -->
      <div class="container">
        <div class="modal-body">
            <div class="row">
          <form id="formReset" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="" class="form-label">Name</label>
              <input type="name" class="form-control" id="name" name="name" placeholder="type your name">
            </div>
          
            <div class="row">
            <div class="mb-3 col-md-4">
                <label for="" class="form-label">Country</label>
                <select name="country" id="country_ids" class="form-select" >
                <option selected>Select Country</option>
                 @foreach ($countries as $country)
                 <option value="{{$country->name}}" id="{{$country->id}}">{{$country->name}}</option>
                 @endforeach     
                </select>
              </div>

              <div class="mb-3 col-md-4">
                <label for="" class="form-label">State</label>
                <select name="state" id="state_ids" class="form-select state" onchange="getstate(this);">
                </select>
              </div>

              <div class="mb-3 col-md-4">
                <label for="" class="form-label">Union</label>
                <select name="city" id="city_id" class="form-select city" onchange="getcity(this);">
                
              
                </select>
              </div>
            </div>
          
          </form>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-submit" id="saveMember">Add Member</button>
        </div>
      </div>
   


{{-- modal end --}}


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
  <script>
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
               });

               function getstate(el){
                // alert("hello");
               var selectElement= document.getElementById("country_ids");
               var country_ids = selectElement.options[selectElement.selectedIndex].id;
              //  console.log(country_ids);
               $('.state').html('');

               $.ajax({
                url :"{{route('get.state')}}",
                type:'get',
                dataType:'json',
                data :{
                  country_id: country_ids
                },
                success:function(res){
                  
                       $('.state').html('<option value="">select state</option>');
                       $.each(res.state,function (key, value ) {  
                        $('.state').append('<option value="' + value.name + '" id="' + value.id + '">'+ value.name + '</option>');
                       });


                }
               });


               }

               function getcity(el){
                // alert("hello");
                var selectElement =document.getElementById("state_ids");
                var state_id =selectElement.options[selectElement.selectedIndex].id;
                //  console.log(state_id);
                $('.city').html('');
                $.ajax({
                  url:"{{route('get.city')}}",
                  type:'get',
                  dataType:'json',
                  data:{
                    state_id :state_id
                  },
                  success:function(res){
                   
                  }
                });
               }

  </script>
@endsection
