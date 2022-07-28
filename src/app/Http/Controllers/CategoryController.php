<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'icon' => 'required',
            'background' => 'required',
        ]);
        Category::create($data);

        return redirect()->back()->with('message', 'Created successfully !');
    }

    public function delete(Request $request)
    {
        Category::destroy($request->category_id);

        return redirect()->back();
    }
}
