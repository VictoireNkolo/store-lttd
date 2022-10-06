<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{

    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getAll();
        return view('backend.admin.categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('backend.admin.categories.create');
    }

    public function store(CategoryRequest $categoryRequest)
    {
        $is_stored = $this->categoryRepository->store($categoryRequest->toArray());
        if ($is_stored) {
            session()->flash('success', 'Catégorie créée avec succès !');
            return redirect()->route('lb_admin.admin.category.index');
        }
        session()->flash('error', 'Vos données n\'ont pas pu être enrégistrées !');
        return redirect()->back();
    }

    public function show($id)
    {
        $category = $this->categoryRepository->one($id);
        return view('backend.admin.categories.show', ['category' => $category]);
    }

    public function edit($id)
    {
        $category = $this->categoryRepository->one($id);
        return view('backend.admin.categories.edit', ['category' => $category]);
    }

    public function update(CategoryRequest $categoryRequest)
    {
        $is_updated = $this->categoryRepository->update($categoryRequest->toArray());
        if ($is_updated) {
            session()->flash('success', 'Catégorie mise à jour avec succès !');
            return redirect()->route('lb_admin.admin.category.index');
        }
        session()->flash('error', 'Vos données n\'ont pas pu être mises à jour !');
        return redirect()->back();
    }

    public function delete($id)
    {
        $is_deleted = $this->categoryRepository->delete($id);
        if ($is_deleted) {
            session()->flash('success', 'Suppression effectuée avec succès !');
            return redirect()->route('lb_admin.admin.category.index');
        }
        session()->flash('error', 'Suppression échouée !');
        return redirect()->back();
    }
}
