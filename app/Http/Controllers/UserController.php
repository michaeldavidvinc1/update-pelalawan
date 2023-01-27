<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = User::latest()->get();

        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', 'dashboard.components.auth.action-btn')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.components.auth.auth');
    }

    public function resetShow($id) {
        $user = User::findOrFail($id);
        return view('dashboard.components.auth.resetPassword', compact('user'));
    }

    public function resetUpdate(Request $request) {
        $id = $request->id;
        $user = User::findOrFail($id);
        $validatedData = $request->validate([
            'password' => 'required',
            'name' => 'max:255',
            'role' => 'max:255',
            'email' => 'max:255',
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['name'] = $user->name;
        $validatedData['role'] = $user->role;
        $validatedData['email'] = $user->email;

        User::findOrFail($id)->update($validatedData);

        return redirect('/user');
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|max:255',
            'role' => 'required|max:255',
            'email' => 'required|email:dns',
            'password' => 'required|max:255',
        ]);

        $validator['password'] = Hash::make($validator['password']);

        User::create($validator);
        return back();
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $user = User::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'role' => 'required|max:255',
            'email' => 'required|email:dns',
            'password' => 'max:255',
        ]);

        $validatedData['password'] = $user->password;

        User::findOrFail($id)->update($validatedData);
        return back();
    }
}
