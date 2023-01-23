<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = User::latest()->get();

        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/edit-password" data-id="'.$row->id.'" class="btn btn-icon icon-left btn-warning"><i class="fas fa-exclamation-triangle"></i> Reset Password</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.components.auth.auth');
    }

    public function resetShow($id) {
        $user = User::find($id);
        return view('dashboard.components.auth.resetPassword', compact('user'));
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
            'bidang_ilmu' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        User::create($validator);
        return back();
    }

    public function update(Request $request)
    {

        $id = $request->id_bidang_ilmu;
        $validatedData = $request->validate([
            'bidang_ilmu'     => 'required|max:255',
            'defunct_ind'     => 'required',
        ]);

        User::findOrFail($id)
            ->update($validatedData);
        return back();
    }
}
