<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Module;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Module $module)
    {
        return view('posts.postForm', compact('module'));
    }

    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['tutor']);
        $this->validatorStore($request->all())->validate();

        //$user = User::find($request->user_id);
        //$post = Post::find($request->post_id);
        //$user->posts()->attach($post);
        $post = new Post($request->all());
        $post->save();
        return back()->with('success','Your post was created.');

    }
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['tutor']);   
        $posts = Post::all();
        return view('posts.postIndex', compact('posts'));
    }
    protected function validatorStore(array $data)
    {
        return Validator::make($data, [
            'user_id' => ['required', 'exists:users,id']
        ]);
    }

}
