<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    private $columns = ['content', 'user_id', 'post_id'];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::with('User')->get();
        return view('postlist', compact('post'));
    }

    public function allposts()
    {
        $post = Post::get();
        return view('allposts', compact('post'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::select('id', 'name')->get();
        return view('addpost', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title'     => 'required',
            'content'   => 'required',
            'user_id'   => 'required',
        ]);
        Post::create($data);
        return redirect('postlist');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        $user = User::with('Post')->get();
        $cmt = Comment::where('post_id', $id)->get();
        return view('postsingle', compact(['post', 'user', 'cmt']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findorFail($id);
        $user = User::select('id', 'name')->get();
        return view('editpost', compact(['post', 'user']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $data = $request->validate([
            'title'     => 'required',
            'content'   => 'required',
        ]);
        Post::where('id', $id)->update($data);
        return redirect('postlist');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Post::where('id', $id)->forceDelete();
        return redirect('postlist');
    }
}
