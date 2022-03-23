<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();

        return view('users.index', compact('users'));
    }
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        notify()->success('User delete successfully ⚡️');
        return redirect()->back();
    }
     public function save(Request $request)
    {
        
        $users= New User();
        $users->name=$request->input('name');
        $users->email=$request->input('email');
        $users->password=Hash::make($request->input('password'));
        $users->save();
        notify()->success('User create successfully ⚡️');
        return redirect()->back();
    }
    public function update(Request $request,$id)
    {
        
        $users = User::findOrFail($id);
        $users->name=$request->input('name');
        $users->email=$request->input('email');
        $users->password=Hash::make($request->input('password'));
        $users->update();
        notify()->success('User update successfully ⚡️');
        return redirect()->back();
    }
}
