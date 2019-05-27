<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Post $post)
    {
        return view('comments.commentForm', compact('post'));
    }

    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['tutor','student']);
        $this->validatorStore($request->all())->validate();
        $comment = new Comment($request->all());
        $comment->save();
        $post = $comment->post;
        return redirect()->route('post.show', compact('post'))->with('success', 'Your comment was made.');
    }
    public function index()
    {
        $comments = Comment::with(['user'])->paginate(10);
        return view('comments.commentIndex', compact('comments'));
    }
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->route('comment.index', compact('comment'))->with('success', 'Your comment was deleted.');
    }

    protected function validatorStore(array $data)
    {
        return Validator::make($data, [
            'body' => ['required'],
            'post_id' => ['required', 'exists:posts,id'],
            'user_id' => ['required', 'exists:users,id']
        ]);
    }
}
