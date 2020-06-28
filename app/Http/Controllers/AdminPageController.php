<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    protected $post_contr;

    function __construct()
    {
        $this->post_contr = new PostController();
    }

    public function index()
    {
        $pageName = "Admin Panel";

        return view('admin_panel/mainAdminPage')->with(['pageName' => $pageName]);
    }

    public function postsPage($user_id)
    {

        $pageName = "Posts Page";

        $posts = $this->post_contr->index($user_id);

        return view('admin_panel/postsPage')->with([
            'pageName' => $pageName, 'posts' => $posts
        ]);

    }

    public function singlePost($id){
        $post = $this->post_contr->single($id);

        return view('admin_panel/singlePost')->with(['post' => $post]);
    }

}
