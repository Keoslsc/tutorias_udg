<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\Convocatory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    public function registerTutor(Request $request)
    {
        $this->validator($request->all())->validate();
         $this->createTutor($request->all());
        return back()->with('Registered', 'You have registered as a tutor, the administrator confirms your request');
        
        
    }
    

    public function showRegistrationTutorForm()
    {
        $convocatory = Convocatory::ShowActive();
        if($convocatory)
        {
            return view('auth.register');
        }
        else
        {
            abort(404, "This page has not been created yet");
        }
    }

    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed']
        ]);
    }

    protected function validatorTutor(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'id_convocatory' => ['required', 'number', 'exists:convocatories']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'status' => 1
        ]);
        $user
            ->roles()
            ->attach(Role::where('name', 'student')->first());
        return $user;
    }

    protected function createTutor(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'status' => 2
        ]);
        $user
            ->roles()
            ->attach(Role::where('name', 'tutor')->first());
        $user
            ->convocatories()
            ->attach(Convocatory::where('id', $data['convocatory_id'])->first());
        return $user;
    }
}
