<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    //
    public function index(){
        $currentUser= auth()->user()->id;
        // $user= User::findorFail($currentUser);
        $user= User::select('id', 'name', 'email', 'address', 'phone', 'gender')->find($currentUser);
        return view('admin.profiles.index', compact('user'));
    }
}
