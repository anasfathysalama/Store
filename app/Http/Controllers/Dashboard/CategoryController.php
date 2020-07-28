<?php

namespace App\Http\Controllers\Dashboard;

use App\CategoryTranslation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {

        if (request('search')) {
            $categories = Category::whereTranslationLike('name',  request('search'))
                ->paginate(2);
        } else {
            $categories = Category::latest()->paginate(5);
        }

        return view('dashboard.categories.index' , compact('categories'));

    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ar.*' => 'required',

        ]);
        Category::create($request->all());
        session()->flash('success', trans('site.added_successfly'));
        return redirect()->route('categories.index');

    }


    public function edit($id)
    {
        $category = Category::find($id);
        return view('dashboard.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {

        $category = Category::FindOrFail($id);
        $category->update($request->all());
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category, $id)
    {
        $category = Category::find($id);

        $category->delete();
        return redirect()->route('categories.index');
    }


}
