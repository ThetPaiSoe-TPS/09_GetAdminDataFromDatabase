<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfilesController extends Controller
{
    //
    public function index(){
        $currentUser= auth()->user()->id;
        // $user= User::findorFail($currentUser);
        $user= User::select('id', 'name', 'email', 'address', 'phone', 'gender')->find($currentUser);
        return view('admin.profiles.index', compact('user'));
    }

    public function updateAdminAccount(Request $request){

        $this->getAdminInfo($request);
        $validator= $this->userValidationCheck($request);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $admin= User::findOrFail(auth()->user()->id);

        $admin->update([
            'name'=> $request->adminName,
            'email'=> $request->adminEmail,
            'phone'=> $request->adminPhone,
            'address'=> $request->adminAddress,
            'gender'=> $request->adminGender
        ]);

        return redirect()->back()->with('success', 'User Updated Successfully');
    }

    private function getAdminInfo($request){
        return [
            'name'=> $request->adminName,
            'email'=> $request->adminEmail,
            'phone'=> $request->adminPhone,
            'address'=> $request->adminAddress,
            'gender'=> $request->adminGender,
            'updated_at'=> Carbon::now()
        ];
    }

    private function userValidationCheck($request){
        return Validator::make($request->all(), [
            'adminName'=> 'required|string|max:30',
            'adminEmail'=> 'required|email|unique:users,email,' . Auth::user()->id,
            'adminPhone'=> 'required|numeric|digits_between:10,15',
            'adminAddress'=> 'required|string|max:100',
            'adminGender'=> 'required',
        ]);


    }

}
