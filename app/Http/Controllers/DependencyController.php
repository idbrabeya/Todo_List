<?php

namespace App\Http\Controllers;
use App\Models\Dependency;
use App\Models\State;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DependencyController extends Controller
{
   
    public function dependent_drop(){
        $countries = Dependency::orderBy('name','ASC')->get();
        return view('dependent',compact('countries'));
    }
    public function get_state(Request $request){
        $state['state'] = State::where('country_id',$request->country_id)->get();
        return response()->json($state);
    }
    public function get_city(Request $request){
       
        $cities['cities']= City::where('state_id',$request->state_id)->get();
        return response()->json($cities);
    }
}
