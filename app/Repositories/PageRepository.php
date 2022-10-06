<?php

namespace App\Repositories;

use App\Models\Page;
use Illuminate\Support\Str;

class PageRepository
{

    /**
     * @var Page
     */
    private $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    public function getAll()
    {
        return $this->page::where(['is_deleted' => 0])
            ->orderBy('title')
            ->paginate(10);
    }

    public function getAllActive()
    {
        return $this->page::where(['is_active' => 1, 'is_deleted' => 0])
            ->orderBy('menu_position')
            ->paginate(10);
    }

    public function one($id)
    {
        return $this->page::where(['id' => $id])->first();
    }

    public function getBySlug($slug)
    {
        return $this->page::where(['slug' => $slug])->first();
    }

    public function getMenuItems()
    {
        return $this->page::where(['is_active' => 1, 'is_deleted' => 0, 'parent_id' => 0])
            ->orderBy('menu_position')
            ->paginate(10);
    }

    /**
     * Creates a page
     *
     * @param array $arrData
     */
    public function store(array $arrData)
    {
        $this->page->title = $arrData['title'];
        $this->page->slug = Str::slug($arrData['title']);
        $this->page->text = $arrData['text'];
        $this->page->parent_id = $arrData['parent_id'];
        $this->page->menu_position = $arrData['menu_position'];
        $this->page->sub_menu_position = $arrData['sub_menu_position'];
        $this->page->is_active = isset($arrData['is_active']) ? $arrData['is_active'] : 0;
        $this->page->is_deleted = 0;

        return $this->page->save();
    }

    /**
     * Updates a page
     * @param array $arrData
     */
    public function update(array $arrData)
    {

        $page = $this->page::find($arrData['id']);

        $page->title = $arrData['title'];
        $page->slug = Str::slug($arrData['title']);
        $page->text = $arrData['text'];
        $page->parent_id = $arrData['parent_id'];
        $page->menu_position = $arrData['menu_position'];
        $page->sub_menu_position = $arrData['sub_menu_position'];
        $page->is_active = isset($arrData['is_active']) ? $arrData['is_active'] : 0;

        return $page->save();
    }

    /**
     * Soft deletes a page
     */
    public function delete($id)
    {
        $page = $this->page::find($id);
        $page->is_deleted = 1;
        return $page->save();
    }
}
