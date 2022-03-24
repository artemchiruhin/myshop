<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $validatedFields = $request->validated();
        $validatedFields['slug'] = Str::slug($validatedFields['title']);
        $category = Category::create($validatedFields);
        if($category) {
            return redirect(route('admin.categories.index'))->with('categoryCreated', 'Категория успешно добавлена.');
        }
        return redirect(route('admin.categories.create'))->withErrors(['formError' => 'При создании категории произошла ошибка.']);
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Category $category, CategoryFormRequest $request)
    {
        $validatedFields = $request->validated();
        $validatedFields['slug'] = Str::slug($validatedFields['title']);

        if($category->update($validatedFields)) {
            return redirect(route('admin.categories.index'))->with('categoryUpdated', 'Категория успешно обновлена.');
        }
        return redirect(route('admin.categories.edit', $category))->withErrors(['formError' => 'При изменении категории произошла ошибка.']);

    }

    public function destroy(Category $category)
    {
        if($category->delete()) {
            return redirect(route('admin.categories.index'))->with('categoryDeleted', 'Категория успешно удалена.');
        }
    }
}
