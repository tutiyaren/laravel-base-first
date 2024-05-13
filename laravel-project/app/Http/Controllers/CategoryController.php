<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UseCase\Category\CreateCategory;
use App\UseCase\Category\EditCategory;
use App\UseCase\Category\DeleteCategory;
use App\UseCase\Category\GetEditCategory;
use App\UseCase\Category\GetCategory;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index(GetCategory $case)
    {
        $categories = $case();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(CategoryRequest $request, CreateCategory $case)
    {
        $case($request);
        return redirect()->route('category.index');
    }

    public function edit($id, GetEditCategory $case)
    {
        $category = $case($id);
        return view('category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id, EditCategory $case)
    {
        $case($request, $id);
        return redirect()->route('category.index');
    }

    public function destroy($id, DeleteCategory $case)
    {
        $case($id);
        return redirect()->route('category.index');
    }
}
