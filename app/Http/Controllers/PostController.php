<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{

    /**
     * Show all post.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(int $user_id = null)
    {

        if ($user_id != 1 && $user_id != null) {
            $posts = (new Post)->select()->where('author_id', $user_id)->orderByRaw('created_at DESC')->get();
        } else {
            $this->allPosts();
        }

        return $posts = count($posts) > 1 ? $posts : 'Not Posts Yet';
    }

    public function cacheContent()
    {
        $get_API_posts = $this->getAllData();

        $posts = (new Post)->leftJoin('users', 'posts.author_id', '=', 'users.id')->select('users.name',
            'posts.*')->orderByRaw("created_at DESC")->get();
        if ($get_API_posts != null) {
            for ($i = 0; $i < count($get_API_posts); $i++) {
                $posts[count($posts)] = [
                    'id'          => count($posts) + 1,
                    'title'       => $get_API_posts[$i]->title,
                    'description' => $get_API_posts[$i]->description,
                    'created_at'  => $get_API_posts[$i]->publication_date,
                    'name'        => 'admin'

                ];
            }
        }
        Cache::put('posts', $posts, 10);
    }

    public function allPosts()
    {
        if (Cache::has('posts')) {
        }else{
            $this->cacheContent();
        }
        return Cache::get('posts');
    }

    /**
     * Show single post.
     *
     * @return \Illuminate\Http\Response
     */

    public function single(int $id = null)
    {
        $posts = Cache::get('posts');
        $post  = $posts[$id];

        return $post;
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'title'       => 'required|max:255',
            'description' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        $postData = $request->all();

        $postData = [
            'title'       => $postData['title'],
            'description' => $postData['description'],
            'author_id'   => $postData['author_id'],
        ];


        (new Post)->create($postData);

        return redirect('/adminPanel/posts/'.$postData["author_id"]);
    }

    private function getAllData()
    {
        $uri = (json_decode(file_get_contents('https://sq1-api-test.herokuapp.com/posts')))->data;

        return $uri;
    }
}
