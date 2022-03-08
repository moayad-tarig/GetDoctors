<?php

namespace App\Http\Controllers;

use App\Models\GetDoctor;
use App\Models\User;
use Illuminate\Http\Request;

class GetDoctors extends Controller
{
    public function index()
    {
        $doctors = User::all();
        return view('getdoctor');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'phone_number' => 'required',
            'area' => 'required',
            

        ]);
        GetDoctor::create($validatedData);
        return redirect()->back()->with('success', 'تم إرسال طلبك وسيتم التواصل معك من أحد أطبائنا قريبا');

    }
   
}
