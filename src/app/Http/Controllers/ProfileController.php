<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(string $name, int $id)
    {
        $user = User::with('blogs')->findOrFail($id);
        return view('profile', ['user' => $user]);
    }
}
