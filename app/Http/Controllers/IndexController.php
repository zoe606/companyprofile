<?php

namespace App\Http\Controllers;

use App\Post;
use App\Setting;
use App\Comment;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function setting() {
        return Setting::first();
    }

    public function index() {
        $setting = $this->setting();
        $posts = Post::where('status', 1)->orderBy('published_at', 'DESC')->limit(3)->get();
        return view('welcome', compact('setting', 'posts'));
    }

    public function blog() {
        $setting = $this->setting();
        $posts = Post::where('status', 1)->orderBy('published_at', 'DESC')->paginate(4);
        return view('blog', compact('setting', 'posts'));
    }

    public function show($slug) {
        $setting = $this->setting();
        $posts = Post::where('status', 1);
        $post = Post::where('slug', $slug)->first();

        $prev = Post::where('id', '<', $post->id)
                ->latest('id')
                ->first();
        $next = Post::where('id', '>', $post->id)
                ->first(); 

        return view('show', compact('setting', 'post', 'posts', 'prev', 'next'));
    }

    public function comment( Request $request, $slug) {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'body' => 'required|min:5'
        ]);

        $post = Post::where('slug', $slug)->first();

        $request['post_id'] = $post->id;
        $request['status'] = 0;
        Comment::create($request->all());

        // return redirect()->route('/blog/'. $slug);
        return redirect()->back();
    }
}