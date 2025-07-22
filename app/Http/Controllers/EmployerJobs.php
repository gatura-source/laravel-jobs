<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use Illuminate\Http\Request;
use App\Models\Jobs;
use Illuminate\Contracts\Queue\Job;

class EmployerJobs extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("employerjobs.index", [
            "jobs" => auth()->user()->employer->jobs()->with([
                'employer', 'jobapplications', 'jobapplications.user'
            ]
            )->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("employerjobs.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobRequest $request)
    {
        try {
            if ($request->user()->employer->jobs()->create($request->validated())) {
            return redirect()->route("employer_jobs.index")->with("success", "Listing added successfully");
            }
            return redirect()->back()->with("error", "Error while adding job listing");
        } catch (\Exception $e) {
            // dd($validated);
            return redirect()->back()->with("error", "Exception: " . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jobs $employer_job)
    {
        return view("employerjobs.edit", [ "job" => $employer_job ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobRequest $request, Jobs $employer_job)
    {
        try {
            if ($employer_job->update($request->validated())) {
            return redirect()->route("employer_jobs.index")->with("success", "Listing updated successfully");
            }
            return redirect()->back()->with("error", "Error while updating job listing");
        } catch (\Exception $e) {
            // dd($validated);
            return redirect()->back()->with("error", "Exception: " . $e->getMessage());
        }  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
