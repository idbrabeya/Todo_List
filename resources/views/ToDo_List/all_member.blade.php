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

                              <th >Action</th>
                            </tr>
                          </thead>
                     
                          <tbody>
                            @forelse ( $all_list_member as $key=> $all_list_members)
                            <tr>
                                <td>{{$key+1}}</td>
                                 <td>{{$all_list_members->name}}</td>
                                 <td>{{$all_list_members->email}}</td>
                                 <td>{{$all_list_members->marital_status}}</td>
                                 <td>{{$all_list_members->phone}}</td>
                
                                 <td>
                                   <a href="{{route('member.edit',$all_list_members->id)}}" class="btn btn-info btn-sm">Edit</a>
                                   <a href="{{route('member.view',$all_list_members->id)}}" class="btn btn-success btn-sm">View</a>
                                   <a href="{{route('member.delete',$all_list_members->id)}}" class="btn btn-danger btn-sm" >Delete</a>
                                   <a href="" class="btn btn-warning btn-sm">Add_More</a>
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