<?php
           
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;
   
class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Blog $post)
    {
        $validatedData = $request->validate([
            'content' => 'required',
        ]);

        $comment = new Comment();
        $comment->body = $validatedData['content'];
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $post->id;

        $post->comments()->save($comment);

        return redirect()->back()->with('success', 'Comment added successfully.');
    }
}