<?php

namespace App\Http\Controllers;

use PDF;
use App\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(User $user)
    {
        /*$pdf = PDF::loadHTML('<p>Hello World!!</p>');
        return $pdf->stream();*/
        $user->load(['profile', 'posts', 'modules', 'modules.posts', 'posts.files', 'posts.comments']);
        $pdf = \PDF::loadView('reports.reportTutor', compact('user'));
        return $pdf->stream();
        //return view('reports.reportTutor', compact('user'));
    }

}
