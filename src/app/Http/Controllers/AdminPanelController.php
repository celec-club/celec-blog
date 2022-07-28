<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminPanelController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function check(Request $request)
    {
        $data = $request->only(['email', 'password']);
        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            return redirect()->intended('admin/panel');
        }

        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showIndex()
    {
        return view('admin.index', ['data' => DB::table('blogs')->selectRaw('SUM(views) as views, COUNT(*) as blogs')->first()]);
    }

    public function showWritePage()
    {
        $users = User::all();
        $categories = Category::all();

        return view('admin.write', ['users' => $users, 'categories' => $categories]);
    }

    public function showCategoriesPage()
    {
        return view('admin.categories', ['categories' => Category::orderByDesc('id')->get()]);
    }

    public function showModifyBlog(Blog $blog)
    {
        $users = User::all();
        $categories = Category::all();

        return view('admin.modifyBlog', ['blog' => $blog, 'categories' => $categories, 'users' => $users]);
    }
}
