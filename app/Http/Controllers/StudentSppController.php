<?php

namespace App\Http\Controllers;

use App\Models\StudentSpp;
use Illuminate\Http\Request;

class StudentSppController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $isAllowed = false;

            if (auth()->check()) {
                $user = auth()->user();
                $isAllowed = $user->role == 'admin';
            }

            if (!$isAllowed) {
                return abort(403);
            }

            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spps = StudentSpp::orderBy('year', 'desc')->get();
        return view('student-spps.index', compact('spps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student-spps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'year' => 'required|integer',
            'amount' => 'required|integer|min:0',
        ]);

        $studentSpp = StudentSpp::create([
            'year' => request('year'),
            'amount' => request('amount'),
        ]);

        session()->flash('successMessage', 'Data saved');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentSpp  $studentSpp
     * @return \Illuminate\Http\Response
     */
    public function show(StudentSpp $studentSpp)
    {
        return view('student-spps.show', compact('studentSpp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentSpp  $studentSpp
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentSpp $studentSpp)
    {
        return view('student-spps.edit', compact('studentSpp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentSpp  $studentSpp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentSpp $studentSpp)
    {
        request()->validate([
            'year' => 'required|integer',
            'amount' => 'required|integer|min:0',
        ]);

        $studentSpp->update([
            'year' => request('year'),
            'amount' => request('amount'),
        ]);

        session()->flash('successMessage', 'Data updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentSpp  $studentSpp
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentSpp $studentSpp)
    {
        //
    }
}
