<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{

    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index($user_id)
    {
        $posts = $this->postRepository->getUserPosts($user_id);
        return view('backend.user.posts.index', ['posts' => $posts]);
    }
}
