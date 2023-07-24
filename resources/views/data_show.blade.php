@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                <table class="table">
                        <thead>
                            <tr>
                              <th >Id</th>
                              <th >Nmae</th>
                              <th >Email</th>
                              <th >Marital_Status</th>
                              <th >Phone</th>
                              <th >Status</th>
                              <th >Image</th>
                              <th >Action</th>
                            </tr>
                          </thead>
                     
                          <tbody>
                            @forelse ($datashows as $key=>$datashow)
                            <tr>
                                <td>{{$key+1}}</td>
                                 <td>{{$datashow->name}}</td>
                                 <td>{{$datashow->email}}</td>
                                 <td>{{$datashow->marital_status}}</td>
                                 <td>{{$datashow->phone}}</td>
                                 
                                 <td>
                                  <a onclick="status_change({{$datashow->id}})"> 
                                  @if ($datashow->status==1)
                                  <span  class="badge bg-primary">active</span>
                                  @else 
                                  <span class="badge bg-danger">deactive</span>
                                   @endif</a>
                                  </td>
                               

                                 <td>
                                    <img style="height: 80px; width:80px" src="{{asset('uploads/'.$datashow->image .'')}}" alt="Image">
                                </td>
                                 <td>
                                   <a href="{{route('info.edit',$datashow->id)}}" class="btn btn-info btn-sm">Edit</a>
                                   <button type="button" class="btn btn-danger btn-sm deletedata" data-id="{{$datashow->id}}" >Delete</button>
                                 </td>
                               </tr>
                            @empty
                                <td colspan="6">
                                    <div>
                                        <span class="text-danger">No Data Show</span>
                                    </div>
                                </td>
                            @endforelse
                           
                          </tbody>
                          
                  </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
  <script>
    

    $(document).ready(function(){
     
      $('.deletedata').click(function(){
        var Id = $(this).data('id');
        

        $.ajax({
          url:' /info_delete/' + Id,
          type:'get',
          dataType:'json',
          success:function (response){
            console.log(response);
            $('#'+ Id).remove();
            window.location.reload();
         
          },
          error:function (xhr){
            console.log(xhr.responseText);
          }
         
          
        });
      });
    });
  </script>
  <script>

 function status_change(id){
  
      $.ajax({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

        type:"post",
        url:'{{route('status.change')}}',
        data:{
        id: id
        },
        success:function(data){
            if(data==1){
              window.location.reload();
            }
        },
        error:function(xhr){
            console.log(xhr.responseTest);
          }
      });
     }

  </script>
@endsection