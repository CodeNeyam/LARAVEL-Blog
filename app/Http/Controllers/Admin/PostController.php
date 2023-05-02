<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }
    

   


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
    
        $post = new Post([
            'user_id' => auth()->user()->id,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);
    
        $post->save();
    
        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $post = Post::findOrFail($id);
    $comments = $post->comments;
    return view('posts.show', compact('post', 'comments'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required',
        'content' => 'required',
    ]);

    $post = Post::findOrFail($id);
    $post->title = $request->input('title');
    $post->content = $request->input('content');
    $post->save();

    return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
    
        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully');
    }
    public function __construct()
{
    $this->middleware('auth')->except(['index', 'show']);
}

}
