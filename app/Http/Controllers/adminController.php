<?php

namespace App\Http\Controllers;

use App\Models\GetDoctor;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function index()
    {
        
        $doctors = User::where('id','<>',auth()->id())->get();

        return view('admin.index', compact('doctors', $doctors));
    }


    public function store(Request $request)
    {
       $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'area' => $request->area,
            'phone_number' => $request->phone_number
        
        ]);
        $user->attachRole("2");
        return back();
    }


    public function request()
    {
        $requests = GetDoctor::all();
        return view('admin.request', compact('requests', $requests));
    }
    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return back();
    }
}
