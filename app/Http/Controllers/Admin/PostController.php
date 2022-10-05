<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{

    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index(Request $request)
    {
        $slug = $request->route('slug');
        $user_id = $request->route('user_id');
        //dd("user_id: $user_id | slug: $slug");
        if ($user_id && !$slug) {
            $posts = $this->postRepository->getUserPosts($user_id);
            return view('backend.admin.posts.index', compact('posts', 'slug', 'user_id'));
        } elseif (!$user_id && $slug) {
            $posts = $this->postRepository->getCategoryPosts($slug);
            return view('backend.admin.posts.index', compact('posts', 'slug', 'user_id'));
        } elseif(!$user_id && !$slug) {
            $posts = $this->postRepository->getAll();
            return view('backend.admin.posts.index', compact('posts', 'slug', 'user_id'));
        }
    }

    public function create()
    {
        return view('backend.admin.posts.create');
    }

    public function store(PostRequest $postRequest)
    {
        $postRequest->request->add(['user_id' => Auth::user()->id]);
        $is_stored = $this->postRepository->store($postRequest->all());
        if ($is_stored) {
            session()->flash('success', 'Article créé avec succès !');
            return redirect()->route('lb_admin.admin.posts.index');
        }
        session()->flash('error', 'Vos données n\'ont pas pu être enrégistrées !');
        return redirect()->back();
    }

    public function show($slug)
    {
        $post = $this->postRepository->one($slug);
        return view('backend.admin.posts.show', compact('post'));
    }

    public function edit($slug)
    {
        $post = $this->postRepository->one($slug);
        return view('backend.admin.posts.edit', ['post' => $post]);
    }

    public function update(PostRequest $postRequest)
    {
        $is_updated = $this->postRepository->update($postRequest->all());
        if ($is_updated) {
            session()->flash('success', 'Article mis à jour avec succès !');
            return redirect()->route('lb_admin.admin.posts.index');
        }
        session()->flash('error', 'Vos données n\'ont pas pu être mises à jour !');
        return redirect()->back();
    }

    public function delete($slug)
    {
        //dd($slug);
        $is_deleted = $this->postRepository->delete($slug);
        if ($is_deleted) {
            session()->flash('success', 'Suppression effectuée avec succès !');
            return redirect()->route('lb_admin.admin.posts.index');
        }
        session()->flash('error', 'Suppression échouée !');
        return redirect()->back();
    }
}
