<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function create(CreateRequest $request)
    {
        Category::create([
            'name' => $request->get('name')
        ]);

        return redirect()->route('categories.index');
    }

    public function edit(int $id)
    {
        $category = Category::findOrFail($id);

        return view('categories.edit', compact('category'));
    }

    public function update(int $id, UpdateRequest $request)
    {
        Category::where('id', $id)
            ->update([
                'name' =>  $request->get('name')
            ]);

        return redirect()->route('categories.index');
    }

    public function delete(int $id)
    {
        Category::where('id', $id)->delete();

        return redirect()->route('categories.index');
    }
}
