<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\PageRepository;
use App\Http\Requests\PageRequest;

class PageController extends Controller
{

    private $pageRepository;

    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    public function index()
    {
        $pages = $this->pageRepository->getAll();
        return view('backend.admin.pages.index', ['pages' => $pages]);
    }

    public function create()
    {
        return view('backend.admin.pages.create');
    }

    public function store(PageRequest $pageRequest)
    {
        //dd($pageRequest->toArray());
        $is_stored = $this->pageRepository->store($pageRequest->toArray());
        if ($is_stored) {
            session()->flash('success', 'Page créée avec succès !');
            return redirect()->route('lb_admin.admin.pages.index');
        }
        session()->flash('error', 'Vos données n\'ont pas pu être enrégistrées !');
        return redirect()->back();
    }

    public function show($id)
    {
        $page = $this->pageRepository->one($id);
        return view('backend.admin.pages.show', ['page' => $page]);
    }

    public function edit($id)
    {
        $page = $this->pageRepository->one($id);
        return view('backend.admin.pages.edit', ['page' => $page]);
    }

    public function update(PageRequest $pageRequest)
    {
        //dd($pageRequest->toArray());
        $is_updated = $this->pageRepository->update($pageRequest->toArray());
        if ($is_updated) {
            session()->flash('success', 'Page mise à jour avec succès !');
            return redirect()->route('lb_admin.admin.pages.index');
        }
        session()->flash('error', 'Vos données n\'ont pas pu être mises à jour !');
        return redirect()->back();
    }

    public function delete($id)
    {
        $is_deleted = $this->pageRepository->delete($id);
        if ($is_deleted) {
            session()->flash('success', 'Suppression effectuée avec succès !');
            return redirect()->route('lb_admin.admin.pages.index');
        }
        session()->flash('error', 'Suppression échouée !');
        return redirect()->back();
    }
}
