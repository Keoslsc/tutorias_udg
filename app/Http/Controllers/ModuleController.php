<?php

namespace App\Http\Controllers;

use App\Module;
use App\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ModuleController extends Controller
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
        $modules = Module::all();
        return view('modules.moduleIndex', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);  
        $divisions = Division::all();
        return view('modules.moduleForm', compact('divisions'));
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
        $module = new Module($request->all());
        $module->save();
        return back()->with('success', 'Data inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        
        $divisions = Division::all();
        return view('modules.moduleForm', compact('module', 'divisions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        $request->user()->authorizeRoles(['admin']);  
        $this->validatorStore($request->all())->validate();
        $module->fill($request->all())->save();
        return redirect()->route('module.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Module $module)
    {
        $request->user()->authorizeRoles(['admin']);  
        $module->status = 0;
        $module->save();
        return redirect()->route('module.index');
    }

    protected function validatorStore(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'min:10', 'max:50'],
            'division_id' => ['required', 'exists:divisions,id']
        ]);
    }
}
