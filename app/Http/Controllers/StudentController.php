<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\User;
use App\Models\StudentClass;
use App\Models\StudentSpp;

class StudentController extends Controller
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
        $students = Student::with('user', 'studentClass', 'studentSpp')
            ->has('user')
            ->latest()
            ->paginate(10);
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dropdown['classes'] = StudentClass::orderby('name')->pluck('name', 'id');
        $dropdown['spp'] = StudentSpp::orderby('year', 'desc')->pluck('year', 'id');
        return view('students.create', compact('dropdown'));
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
            'nisn' => 'required|unique:users,username',
            'nis' => 'required|unique:students,code',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'phone' => 'required',
            'address' => 'required',
            'class' => 'required',
            'spp' => 'required',
        ]);

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'username' => request('nisn'),
            'is_admin' => false,
            'role' => 'student',
        ]);

        $student = Student::create([
            'user_id' => $user->id,
            'student_class_id' => request('class'),
            'student_spp_id' => request('spp'),
            'code' => request('nis'),
            'phone' => request('phone'),
            'address' => request('address'),
        ]);

        session()->flash('successMessage', 'Data saved');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $student->load('user', 'studentClass', 'studentSpp');
        $dropdown['classes'] = StudentClass::orderby('name')->pluck('name', 'id');
        $dropdown['spp'] = StudentSpp::orderby('year', 'desc')->pluck('year', 'id');
        return view('students.show', compact('student', 'dropdown'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $student->load('user', 'studentClass', 'studentSpp');
        $dropdown['classes'] = StudentClass::orderby('name')->pluck('name', 'id');
        $dropdown['spp'] = StudentSpp::orderby('year', 'desc')->pluck('year', 'id');
        return view('students.edit', compact('student', 'dropdown'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        request()->validate([
            'nisn' => 'required|unique:users,username,' . $student->user->id,
            'nis' => 'required|unique:students,code,' . $student->id,
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $student->user->id,
            'password' => 'nullable|min:8',
            'phone' => 'required',
            'address' => 'required',
            'class' => 'required',
            'spp' => 'required',
        ]);

        $student->user->update([
            'name' => request('name'),
            'email' => request('email'),
            'username' => request('nisn'),
        ]);

        if (request('password')) {
            $student->user->update([
                'password' => bcrypt(request('password')),
            ]);
        }

        $student->update([
            'student_class_id' => request('class'),
            'student_spp_id' => request('spp'),
            'code' => request('nis'),
            'phone' => request('phone'),
            'address' => request('address'),
        ]);

        session()->flash('successMessage', 'Data updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
