<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function directChangePassword(){
        return view('admin.profiles.changePassword');
    }

    public function changePassword(Request $request){
        $validation= $this->changePasswordValidationCheck($request);
        if($validation->fails()){
            return back()->withErrors($validation)->withInput();
        }
        $dbData= User::where('id', Auth::user()->id)->first();
        $dbPassword= $dbData->password;

        $hashedUserPassword= Hash::make($request->newPassword);
        $updateData= [
            'password'=> $hashedUserPassword,
            'updated_at'=> Carbon::now(),
        ];

        if(Hash::check($request->oldPassword, $dbPassword)){
            User::where('id', Auth::user()->id)->update($updateData);
            return redirect()->route('dashboard');
        }
        else{
            return back()->with(['fails'=> 'Old password does not match with New Password']);
        }
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

    private function changePasswordValidationCheck($request){
        $validationRules= [
            'oldPassword'=> 'required',
            'newPassword'=> 'required|min:8',
            'confirmPassword'=> 'required|same:newPassword|min:8'
        ];
        $validationMessage= [
            'confirmPassword.same'=> '확인 비밀번호와 새 비밀번호가 동일해야 합니다.',
        ];
        return Validator::make($request->all(),$validationRules, $validationMessage);
    }

}
