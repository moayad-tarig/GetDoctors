<?php

namespace App\Http\Controllers;

use App\Models\Accepted;
use App\Models\GetDoctor;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function index()
    {
        
        return view('doctor.index');
    }
    public function update(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'phone_number' => 'required',
            'area' => 'required',
            'image' => 'nullable',
            

        ]);
        $id = $request->user()->id;
       
        User::find($id)->update($validatedData);
        return redirect()->back()->with('success', 'Your Profile are successfully updated');
    }
    
    public function request(){
        $area = Auth()->user()->area;
       

        $requests = GetDoctor::where('area', $area)->get();
        return view('doctor.request', [
            'requests' => $requests
        ]);
    }
    public function accept(Request $request){
      
        Accepted::create([
            "accept_id" => $request->id,
            'user_id' => Auth()->user()->id, 
            'name' => $request->name,
            'area' => $request->area,
          
            'phone_number' => $request->phone_number
        ]);

        $deleteData = GetDoctor::where('id', $request->id)->delete();
        
        return back();
    }
    public function accepted(){
        $userId = Auth::user()->id;
        $accepted = Accepted::where('user_id', $userId)->get();

        return view('doctor.accepted', [
            'accepts' => $accepted,
        ]);
    }
}
