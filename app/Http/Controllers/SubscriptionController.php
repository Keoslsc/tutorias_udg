<?php

namespace App\Http\Controllers;

use App\User;
use App\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = User::find($request->user_id);
        $module = Module::find($request->module_id);
        $user->modules()->attach($module);
        return back()->with('success','You have entered the module.');
    }

    public function destroy(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = User::find($request->user_id);
        $module = Module::find($request->module_id);
        $user->modules()->detach($module);
        return back()->with('error','You have left the module.');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'module_id' => ['required', 'exists:modules,id'],
            'user_id' => ['required', 'exists:users,id']
        ]);
    }
}
