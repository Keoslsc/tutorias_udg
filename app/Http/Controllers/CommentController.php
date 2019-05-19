<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create(Module $module)
    {
        //
    }

    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['tutor','student']);
        $this->validatorStore($request->all())->validate();

        $comment = new Comment($request->all());
        $comment->save();

    }
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['tutor','student']);   
        $comment = Post::all();
        return view('comments.commentIndex', compact('comments'));
    }
    protected function validatorStore(array $data)
    {
        return Validator::make($data, [
            'post_id' => ['required', 'exists:posts,id'],
            'user_id' => ['required', 'exists:users,id']
        ]);
    }
}
