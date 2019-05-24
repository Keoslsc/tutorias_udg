<?php

namespace App\Http\Controllers;

use App\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DivisionController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::with(['modules'])->get();
        return view('divisions.divisionIndex', compact('divisions'));
    }

    public function IndexModulesFromDivision(Request $request, Division $division)
    {
        $user = $request->user();
        return view('divisions.modulesFromDivision', compact('division', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);  
        return view('divisions.divisionForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);  
        $this->validatorStore($request->all())->validate();
        $division = new Division($request->all());
        $division->save();
        $divisions = Division::with(['modules'])->get();
        return redirect()->route('divisions.index')->with('success', 'Data inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function show(Division $division)
    {
        return view('divisions.divisionIndexHome', compact('division'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function edit(Division $division)
    {
        $request->user()->authorizeRoles(['admin']);
        return view('divisions.divisionForm', compact('division'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Division $division)
    {
        $request->user()->authorizeRoles(['admin']);  
        $this->validatorStore($request->all())->validate();
        $division->fill($request->all())->save();
        return redirect()->route('division.index')->with('success', 'Data updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Division $division)
    {
        $request->user()->authorizeRoles(['admin']);  
        $response = '';
        $message = '';
        if($division->status){
            $division->status = 0;
            $response = 'error';
            $message = 'You have deactivated the division correctly';
        }
        else{
            $response = 'success';
            $message = 'You have activated the division correctly';
            $division->status = 1;
        }
        $division->save();
        return redirect()->route('division.index')->with($response, $message);
    }


    protected function validatorStore(array $data)
    {
        return Validator::make($data, [
            'description' => ['required', 'min:10', 'max:60']
        ]);
    }
}
