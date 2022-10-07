<?php


namespace App\Repositories;


use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostRepository
{

    /**
     * @var Post
     */
    private $post;
    private $category;
    private $user;

    public function __construct(Post $post, Category $category, User $user)
    {
        $this->post = $post;
        $this->category = $category;
        $this->user = $user;
    }

    public function getAll()
    {
        return $this->post::where(['is_deleted' => 0])
        ->orderBy('title')
        ->paginate(50);
    }

    public function getCategoryPosts($slug)
    {
        if ($slug) {
            $query = $this->category->whereSlug($slug)->firstOrFail()->posts();
            return $query->latest()->paginate(20);
        }

        $query = Post::query();
        return $query->latest()->paginate(20);
    }

    public function getUserPosts($user_id)
    {
        $query = $this->user->whereId($user_id)
            ->firstOrFail()
            ->posts();
        return $query->latest()
            ->paginate(50);
    }

    public function one($slug)
    {
        return $this->post::whereSlug($slug)
            ->with('categories')
            ->with('user')
            ->first();
    }

    /**
     * Creates a post
     *
     * @param array $data
     */
    public function store(array $data)
    {
        $this->post->title = $data['title'];
        $this->post->slug = Str::slug($data['title']);
        $this->post->description = $data['description'];
        $this->post->is_active = 1;
        //$this->post->is_deleted = 0;
        $this->post->user_id = $data['user_id'];
        $is_saved = $this->post->save();
        if ($is_saved) {
            $this->post->categories()->attach($data['categories']);
            return true;
        }
        return false;
    }

    /**
     * Updates a post
     * @param array $arrData
     */
    public function update(array $data)
    {
        $post_ids_of_user = $this->post::whereUser_id(Auth::user()->id)
            ->pluck('id')
            ->toArray();

        if (in_array($data['id'], $post_ids_of_user)) {
            $post = $this->post::find($data['id']);

            $post->title = $data['title'];
            $post->slug = Str::slug($data['title']);
            $post->description = $data['description'];

            $is_saved = $post->save();
            if ($is_saved) {
                $post->categories()->sync($data['categories']);
                return true;
            }
            return false;
        }
        return false;
    }

    /**
     * Soft deletes a post
     * @param $slug
     * @return bool
     */
    public function delete($id)
    {
        $post = $this->post::find($id);
        $post->is_deleted = 1;
        return $post->save();
    }
}
