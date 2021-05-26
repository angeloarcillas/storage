<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Scholar;
use App\User;

class ScholarController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'); // all
    }

    public function index()
    {
        //
        return view('scholar/index', [
            'applicants' => auth()->user()->applicants
        ]);
    }

    public function create()
    {
        //
        return view('scholar/create');
    }

    public function store(Request $request,Scholar $scholar)
    {
        $request->validate([
              // personal info
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'min:3', 'max:255'],
            'gender' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email','min:10','max:255', 'unique:users'],
            'contactNumber' =>['required', 'digits_between:5,20'],
            'employment' => ['required', 'string', 'min:6', 'max:255'],

            // birth date
            'month' => ['required', 'digits_between:1,2', 'max:255'],
            'day' => ['required', 'digits_between:1,2', 'max:255'],
            'year' => ['required','digits:4'],

            // guardian info
            'guardianName' => ['required', 'string', 'min:3', 'max:255'],
            'guardianContactNumber' =>['required', 'digits_between:5,20'],
            // scholar info
            'scholarType1' => ['string', 'min:3', 'max:255','nullable'],
            'scholarType2' => ['string', 'min:3', 'max:255','nullable'],
            'scholarType3' => ['string', 'min:3', 'max:255','nullable'],
            // class info
            'classCourse' => ['required', 'string', 'min:6', 'max:255'],
            'classSubject' => ['required', 'string', 'min:6', 'max:255'],
            'classTime' => ['required', 'min:6', 'max:255']

             ]);

        $scholar->addApplicant($request);
        return view('/home');
    }

    public function show($id,Scholar $scholar)
    {

        $scholar = \App\Scholar::findOrFail($id);
        $this->authorize('view',$scholar);
        // $scholar = $scholar->zxc($verifyUser);
        return view('scholar/show',compact('scholar'));
    }

    public function edit(Scholars $scholars)
    {
        //
    }

    public function update(Request $request, Scholars $scholars)
    {
        //
    }

    public function destroy(Scholars $scholars)
    {
        //
    }
}
