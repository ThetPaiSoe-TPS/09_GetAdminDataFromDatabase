<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index()
    {
        $userData = User::select('id', 'name', 'email', 'address', 'phone', 'gender', 'created_at')->get();
        return view('admin.list.index', compact('userData'));
    }

    // public function deleteAccount($id){
    //     $user= User::find($id);
    //     $currentId= Auth::id();
    //     if ($currentId != $id) {
    //         $user->delete();
    //         return back()->with(['deleteSuccess'=> 'User Account Deleted!']);
    //     }
    //     else{
    //         return back()->with(['deleteError'=> 'Unable to delete account.']);
    //     }
    // }

    public function deleteAccount($id)
    {
        User::find($id)->delete();
        return back()->with(['deleteSuccess' => 'User Account Deleted!']);
    }

    //data searching
    public function listSearch(Request $request)
    {
        $search= $request->adminSearch;
        if (!empty($search)) {
            // Apply search logic to filter $userData
            $userData = User::where('name', 'like', '%' . $search . '%')
                               ->orWhere('email', 'like', '%' . $search . '%')
                               // Add more conditions as needed
                               ->get();
        } else {
            // Fetch all data if no search query is provided
            $userData = User::all(); 
        }
    
        return view('admin.list.index', compact('userData'));
        // $userData= User::where('name', $request->adminSearch)->get();
        // return view('admin.list.index', compact('userData'));
    }
}
