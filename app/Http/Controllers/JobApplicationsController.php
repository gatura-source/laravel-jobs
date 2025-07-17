<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\Jobs;
use Illuminate\Http\Request;

class JobApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Jobs $job)
    {
        //
        return view('applications.createapplication', ['job' => $job]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Jobs $job, Request $request)
    {
        $job->jobapplications()->create([
            'user_id' => $request->user()->id,
            ...$request->validate([
                'expected_salary' => 'required|min:1|max:1000000',
            ]),
        ]);

        return redirect()->route('jobs.show', $job)
            ->with('success', 'Job application submitted.');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobApplication $jobApplication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(JobApplication $jobApplication)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, JobApplication $jobApplication)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(JobApplication $jobApplication)
    // {
    //     //
    // }
}
