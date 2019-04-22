<?php

namespace App\Http\Controllers;

use App\Career;
use App\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CareerController extends Controller
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
        $careers = Career::all();
        return view('careers.careerIndex', compact('careers'));
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
        return view('careers.careerForm', compact('divisions'));
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
        $career = new Career($request->all());
        $career->save();
        return back()->with('success', 'Data inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function show(Career $career)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function edit(Career $career)
    {
        $divisions = Division::all();
        return view('careers.careerForm', compact('career', 'divisions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Career $career)
    {
        $request->user()->authorizeRoles(['admin']);  
        $this->validatorStore($request->all())->validate();
        $career->fill($request->all())->save();
        return redirect()->route('career.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Career $career)
    {
        $request->user()->authorizeRoles(['admin']);  
        $career->status = 0;
        $career->save();
        return redirect()->route('career.index');
    }

    protected function validatorStore(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'min:10', 'max:50'],
            'division_id' => ['required', 'exists:divisions,id']
        ]);
    }
}
