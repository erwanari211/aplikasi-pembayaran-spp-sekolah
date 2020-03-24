<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Student;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $isAllowed = false;

            if (auth()->check()) {
                $user = auth()->user();
                $isAllowed = $user->is_admin;
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
        $payments = Payment::with('user', 'student', 'student.user', 'student.studentClass')
            ->latest()
            ->paginate(20);
        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $studentId = request('student_id');
        $student = Student::with('user', 'studentClass', 'studentSpp')
            ->with(['payments' => function($q){
                $q->with('user')
                    ->orderBy('year', 'desc')
                    ->orderBy('month', 'desc');
            }])
            ->findOrFail($studentId);
        return view('payments.create', compact('student'));
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
            'student_id' => 'required',
            'student_spp_id' => 'required',
            'year' => 'required|integer',
            'month' => 'required|integer|min:1|max:12',
            'amount' => 'required|integer',
        ]);

        $payment = Payment::create([
            'user_id' => auth()->user()->id,
            'student_id' => request('student_id'),
            'student_spp_id' => request('student_spp_id'),
            'paid_at' => date('Y-m-d'),
            'year' => request('year'),
            'month' => request('month'),
            'status' => 'paid',
            'amount' => request('amount'),
        ]);

        session()->flash('successMessage', 'Data saved');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
