<?php

namespace App\Http\Controllers;

use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
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
        $classes = StudentClass::orderBy('major')->orderBy('name')->get();
        return view('student-classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student-classes.create');
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
            'name' => 'required',
            'major' => 'required',
        ]);

        $studentClass = StudentClass::create([
            'name' => request('name'),
            'major' => request('major'),
        ]);

        session()->flash('successMessage', 'Data saved');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function show(StudentClass $studentClass)
    {
        return view('student-classes.show', compact('studentClass'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentClass $studentClass)
    {
        return view('student-classes.edit', compact('studentClass'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentClass $studentClass)
    {
        request()->validate([
            'name' => 'required',
            'major' => 'required',
        ]);

        $studentClass->update([
            'name' => request('name'),
            'major' => request('major'),
        ]);

        session()->flash('successMessage', 'Data updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentClass $studentClass)
    {
        //
    }
}
