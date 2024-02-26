<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comment;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{
    private $columns = ['content', 'user_id', 'post_id'];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->only($this->columns);
        Comment::create($data);
        return redirect()->route('postsingle', $request->post_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'content'   => 'required',
        ]);
        Comment::where('id', $id)->update($data);
        return redirect()->route('postsingle', $request->post_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request): RedirectResponse
    {
        Comment::where('id', $id)->delete();
        return redirect()->route('postsingle', $request->post_id);
    }
}
