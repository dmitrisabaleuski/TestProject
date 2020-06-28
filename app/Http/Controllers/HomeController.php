<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $post_contr;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->post_contr = new PostController();
        /*$this->middleware('auth');*/
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($sort = null)
    {
        $posts     = $this->post_contr->allPosts();
        $sort_html = "<option selected value='DESC'>From New To Old</option>
                <option value='ASC'>From Old to New</option>";
        if ($sort == 'ASC') {
            $sort_html = "<option   value='DESC'>From New To Old</option>
                <option selected value='ASC'>From Old to New</option>";
            return view('layouts.allPosts')->with([
                'posts' => $posts->reverse(),
                'sort'  => $sort_html
            ]);
        }
        return view('layouts.allPosts')->with([
            'posts' => $posts,
            'sort'  => $sort_html
        ]);
    }

    public function sort(Request $request)
    {
        $test = $request->all();

        return $this->index($test['sort_by']);
    }

    public function singlePost($id)
    {

        $post = $this->post_contr->single($id);

        return view('layouts/singlePost')->with(['post' => $post]);
    }
}
