<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Apiproject;
use Illuminate\Auth\Events\validated;
use Response;
use Spatie\FlareClient\Api;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    
    {
      
        return view('home');
    }

    public function info_create(Request $request){
        $request->validate([
              'name'=>'regex:/^\D.*$/',
              'phone'=>'min:11','numeric','max:11'
        ]);

         $test_data_insert = new Test;
         $test_data_insert->name= $request->name;
         $test_data_insert->email= $request->email;
         $test_data_insert->phone= $request->phone;
         $test_data_insert->marital_status= $request->marital_status;
         if ($request->hasFile('image')) {
           $photo =$request->file('image');
           $photo_path = time().'.'.$photo->getClientOriginalExtension();
           $photo_store = public_path('uploads');
           $photo->move($photo_store,$photo_path);
           $test_data_insert->image =$photo_path;
         }
        
         $test_data_insert->save();
         return response()->json(['status' => 'success']);
        //  return redirect()->route('info.data.show')->with('message','Data added Successfully');
         
    }

    public function info_data_show(){
      
        $datashows = Test::all();
        return view('data_show',compact('datashows'));
    }
    public function info_edit($id){
    $info_edit=  Test::findOrfail($id);
    return view('info_edit',compact('info_edit'));
          
    }
    public function info_update(Request $request, $id){
        $info_update = Test::findOrfail($id);
        $info_update->name = $request->name;
        $info_update->email = $request->email;
        $info_update->marital_status= $request->marital_status;

        $info_update->phone = $request->phone;
        if ($request->hasFile('new_image')) {
            $photo =$request->file('new_image');
            $photo_path = time().'.'.$photo->getClientOriginalExtension();
            $photo_store = public_path('uploads');
            $photo->move($photo_store,$photo_path);
            $info_update->image = $photo_path;
          }
        $info_update->save();
        return redirect()->route('info.data.show');


    }
    public function status_change(Request $request){
          
           $status_change =Test::findOrFail($request->id);
          
          
           if ($status_change->status== 1) {
            $status_change->status = 0;
           }else{
            $status_change->status = 1;
           }
        //    $status_change->save;
           if($status_change->save()){
            return 1;
           } else{
            return 0;
           }

          
    }


    public function info_delete($id){
        $info_delete = Test::findOrFail($id);
        $image_path = 'uploads/' .  $info_delete->image;
        unlink($image_path);
        $info_delete->delete();
        return response()->json(['status'=>'success']);
        // return back()->with('error','Data Deleted');
    }


   

    public function user_data1(){
        $users= User::all(); 
        return response()->json(['user'=>$users]);
    }

    public function user_data(){
        $api_data = User::all();
        return view('user',compact('api_data'));
        // return response()->json($api_data, Response::HTTP_OK);

     }
     public function test_api(){
        $product = Apiproject::all();
        return response()->json(['product'=>$product]);
     }
     public function api_data(){
        $product = Apiproject::all();
        return view('user',compact('product'));
     
}

}