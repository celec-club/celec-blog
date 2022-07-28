<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function show()
    {
        $icon = Http::get('127.0.0.1/api/icon/generate');

        return view('admin.users', ['users' => User::orderByDesc('id')->paginate(15), 'icon' => $icon]);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'icon' => 'required',
        ]);
        User::create($data);

        return redirect()->back()->with('message', 'Created successfully !');
    }

    public function delete(Request $request)
    {
        User::destroy($request->user_id);

        return redirect()->back();
    }
}
