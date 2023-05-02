<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Post::orderBy('created_at', 'desc');
    
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', '%'.$searchTerm.'%')
                  ->orWhere('content', 'like', '%'.$searchTerm.'%');
            });
        }
    
        $posts = $query->paginate(10);
    
        return view('posts.index', compact('posts'));
    }
    

    public function storeComment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required',
        ]);
    
        $comment = new Comment([
            'post_id' => $id,
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'comment' => $request->input('comment'),
        ]);
    
        $comment->save();
    
        return redirect()->route('posts.show', $id)->with('success', 'Comment added successfully');
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
    public function store(Request $request)
    {
        //
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
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
    public function __construct()
{
    $this->middleware('auth')->except(['index', 'show']);
}

}
