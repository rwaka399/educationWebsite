<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function adminHome(){

        return view('home');
    }
    
    // Tambah User
    public function createUser()
    {
        return view('admin.adminCreate');
    }

    public function createNew(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email|unique:users,email',
            'name'      => 'required',
            'password'  => 'required',
            // 'role'      => 'required|in:user,admin,author',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data = [
            'email'     => $request->email,
            'name'      => $request->name,
            'password'  => bcrypt($request->password),
            // 'type'      => $request->role,
        ];

        User::create($data);

        return redirect()->route('admin/users');
    }

    // Edit User
    public function edit(Request $request, $id)
    {
        $data = User::find($id);

        return view('admin.adminEdit', compact('data'));
    }

    // Update User
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email|unique:users,email,' . $id,
            'name'      => 'required',
            'password'  => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data = [
            'email'     => $request->email,
            'name'      => $request->name,
            
        ];

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        User::whereId($id)->update($data);

        return redirect()->route('admin/users')->with('success', 'User updated successfully');
    }

    // Delete User
    public function delete($id){
        $data = User::findOrFail($id);
        $data->delete();

        return redirect()->route('admin/users')->with('success', 'Berhasil Dihapus Coy');
    }
}
